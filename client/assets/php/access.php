<?php
$response = [];
if (
    isset($_POST['email']) &&
    isset($_POST['password'])
) {
    include_once '../../../assets/php/database.php';
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT  id, email, names, lastname1, lastname2, ubigeo, social_networks, birth_date, status
    FROM general_users WHERE email = ? and password = ?');
    $query -> execute([
        $_POST['email'],
        hash('sha256', $_POST['password'])
    ]);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
        if ($row['status']) {
            $response['status'] = 200;
            $response['message'] = 'Inicio de sesión correcto';
            $response['data'] = $row;
            // Seteando la sesión
            session_start();
            $_SESSION['user'] = [
                'id' => $row['id'],
                'email' => $row['email'],
                'names' => $row['names'],
                'lastname1' => $row['lastname1'],
                'lastname2' => $row['lastname2'],
                /*'ubigeo'['departamento'] => $row['ubigeo']['departamento'],
                'ubigeo'['provincia'] => $row['ubigeo']['provincia'],
                'ubigeo'['distrito'] => $row['ubigeo']['distrito'],
                'ubigeo'['tipoCalle'] => $row['ubigeo']['tipoCalle'],
                'ubigeo'['ubigeo'] => $row['ubigeo']['ubigeo'],
                'ubigeo'['calle'] => $row['ubigeo']['calle'],*/
                'social_networks' => json_decode($row['social_networks']),
                'birth_date' => $row['birth_date'],
                
            ];
            $_SESSION['user']['ubigeo'] = json_decode($row['ubigeo'], true);
            
         
            $_SESSION['rol'] = [
                'id' => 'client',
                'name' => 'Cliente General',
                'description' => 'Cliente General'
            ];
            $_SESSION['status'] = boolval($row['status']);
            $_SESSION['type'] = 'client';
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