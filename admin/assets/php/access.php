<?php
$response = [];
if (
    isset($_POST['username']) &&
    isset($_POST['password'])
) {
    include_once '../../../assets/php/database.php';
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT
        a.id, a.username, a.password, a.name, a.dni, a.email,
        a.phone, a.address, r.id AS rol_id, r.rol AS rol_name,
        r.description AS rol_description, a.status
    FROM admins a INNER
    JOIN admin_roles r ON a._rol = r.id
    WHERE 
        (
            a.username = ? OR
            a.email = ?
        ) AND
        a.password = ?
    ');
    $query -> execute([
        $_POST['username'],
        $_POST['username'],
        hash('sha256', $_POST['password'])
    ]);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
        if ($row['status']) {
            $response['status'] = 200;
            $response['message'] = 'Inicio de sesión correcto';
            // Seteando la sesión
            session_start();
            $_SESSION['user'] = [
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                'name' => $row['name'],
                'dni' => $row['dni'],
                'email' => $row['email'],
                'phone' => $row['phone'],
                'address' => $row['address']
            ];
            $_SESSION['rol'] = [
                'id' => $row['rol_id'],
                'name' => $row['rol_name'],
                'description' => $row['rol_description']
            ];
            $_SESSION['status'] = boolval($row['status']);
            $_SESSION['type'] = 'admin';
        } else {
            $response['status'] = 400;
            $response['message'] = 'Este usuario se encuentra inactivo';
        }
    } else {
        $response['status'] = 400;
        $response['message'] = 'Credenciales incorrectas';
    }
} else {
    $response['status'] = 400;
    $response['message'] = 'Rellene los campos primero';
}
http_response_code($response['status']);
echo json_encode($response, JSON_PRETTY_PRINT);
?>