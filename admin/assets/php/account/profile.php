<?php
// USANDO SESIÓN
session_start();
// CANCELANDO LOS REPORTES DE ERROR
error_reporting(0);
$request = json_decode(file_get_contents('php://input'), true);
$response = [];
try {
    if (!$_SESSION['status'] && $_SESSION['type'] == 'admin') {
        throw new Exception('Error de sesión, intente recargar la pagina', 1);
    }
    require_once '../../../../assets/php/database.php';
    $db = new Database();
    $connection = $db -> connect();
    if ($connection == false) {
        throw new Exception('No se pudo conectar a la base de datos', 1);
    }
    // MÉTODOS DEL REQUEST
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            break;
        case 'POST':
            break;
        case 'PUT':
            break;
        case 'PATCH':
            $query = $connection -> prepare('UPDATE `admins` SET
                `profile_mini`= ?,
                `profile_full`= ?,
                `profile_type`= ?
            WHERE `id` = ?');
            $result = $query -> execute([
                base64_decode($request['source']),
                base64_decode($request['source']),
                $request['type'],
                $_SESSION['user']['id']
            ]);
            if ($result) {
                $_SESSION['profile'] = true;
                $response['message'] = 'La foto de perfil ha sido actualizada';
            } else {
                throw new Exception('No se pudo actualizar la foto de pefil', 1);
            }
            break;
        case 'DELETE':
            $query = $connection -> prepare('UPDATE `admins` SET
                `profile_mini`= NULL,
                `profile_full`= NULL,
                `profile_type`= NULL
            WHERE `id` = ?');
            $result = $query -> execute([$_SESSION['user']['id']]);
            if ($result) {
                $_SESSION['profile'] = false;
                $response['message'] = 'La foto de perfil ha sido eliminada';
            } else {
                throw new Exception('No se pudo eliminar la foto de pefil', 1);
            }
            break;
        default:
            throw new Exception('El método solicitado es incorrecto', 1);
            break;
    }
    $response['status'] = 200;
} catch (Exception $e) {
    $response['status'] = 400;
    $response['message'] = $e -> getMessage();
} finally {
    http_response_code($response['status']);
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
