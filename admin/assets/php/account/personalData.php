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
            $query = $connection -> prepare('SELECT username
                FROM `admins`
                WHERE 
                    id = ? AND
                    password = ?');
            $query -> execute([
                $_SESSION['user']['id'],
                hash('sha256', $request['confirmation'])
            ]);
            if (!$query -> fetch(PDO::FETCH_ASSOC)) {
                throw new Exception('Contraseña incorrecta, intentalo denuevo', 1);
            }
            $query = $connection -> prepare('UPDATE `admins` SET
                `name` = ?,
                `phone` = ?,
                `address` = ?
            WHERE `id` = ?');
            $result = $query -> execute([
                $request['name'],
                $request['phone'],
                $request['address'],
                $_SESSION['user']['id']
            ]);
            if ($result) {
                $_SESSION['user']['name'] = $request['name'];
                $_SESSION['user']['phone'] = $request['phone'];
                $_SESSION['user']['address'] = $request['address'];
                $response['message'] = 'Los datos han sido actualizados';
            } else {
                throw new Exception('No se pudo actualizar los datos', 1);
            }
            break;
        case 'DELETE':
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
