<?php
// USANDO SESIÓN
session_start();
// CANCELANDO LOS REPORTES DE ERROR
error_reporting(0);
$request = $_GET;
$response = [];
try {
    require_once '../../../assets/php/database.php';
    $db = new Database();
    $connection = $db->connect();
    if ($connection == false) {
        throw new Exception('No se pudo conectar a la base de datos', 1);
    }
    // Tipos de imagen
    switch ($request['type']) {
        case 'mini':
            $query = $connection -> prepare('SELECT
                profile_mini,
                profile_type
            FROM admins
            WHERE id = ?
            ');
            $query -> execute([$request['id']]);
            $row = $query -> fetch(PDO::FETCH_ASSOC);
            if ($row && !empty($row['profile_mini'])) {
                $response['source'] = $row['profile_mini'];
                $response['type'] = $row['profile_type'];
            } else {
                throw new Exception('Error al obtener datos de imagen', 1);
            }
            break;
        case 'full':
            $query = $connection -> prepare('SELECT
                profile_full,
                profile_type
            FROM admins
            WHERE id = ?
            ');
            $query -> execute([$request['id']]);
            $row = $query -> fetch(PDO::FETCH_ASSOC);
            if ($row && !empty($row['profile_full'])) {
                $response['source'] = $row['profile_full'];
                $response['type'] = $row['profile_type'];
            } else {
                throw new Exception('Error al obtener datos de imagen', 1);
            }
            break;
        default:
            throw new Exception('La resolución solicitada no está disponible', 1);
            break;
    }
    $response['status'] = 200;
} catch (Exception $e) {
    $response['status'] = 400;
    $response['source'] = file_get_contents('../../../assets/img/user-not-found.svg');
    $response['type'] = 'image/svg+xml';
} finally {
    http_response_code($response['status']);
    header('Content-Type: ' . $response['type']);
    echo $response['source'];
}