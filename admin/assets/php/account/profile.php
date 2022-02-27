<?php
// USANDO SESIÓN
session_start();
// CANCELANDO LOS REPORTES DE ERROR
error_reporting(0);
$request = json_decode(file_get_contents('php://input'), true);
$response = [];
$response['status'] = 400;
$response['message'] = 'Ocurrió un error';
try {
    require_once '../../../../assets/php/database.php';
    $db = new Database();
    $connection = $db -> connect();
    if ($connection == false) {
        throw new Exception('No se pudo conectar a la base de datos', 1);
    }
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            break;
        case 'POST':
            break;
        case 'PUT':
            break;
        case 'PATCH':
            break;
        case 'DELETE':
            $query = $connection -> prepare('UPDATE `admins` SET
                `profile_mini`= NULL,
                `profile_full`= NULL,
                `profile_type`= NULL
            WHERE `id` = ?');
            $result = $query -> execute([$_SESSION['user']['id']]);
            if ($result) {
                $response['message'] = 'Operación correcta';
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
    $response['message'] = $e -> getMessage();
} finally {
    http_response_code($response['status']);
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
?>