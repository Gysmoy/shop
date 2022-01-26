<?php
session_start();
if (
    isset($_SESSION['status']) &&
    $_SESSION['status'] == true &&
    isset($_SESSION['type']) &&
    $_SESSION['type'] == 'client' 
) {

    $res = [];
    $res['status'] = '200';
    $res['message'] = 'NTS';
    $res['data'] = [];

    include_once '../../../assets/php/database.php';
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT email, names, lastname1, lastname2, ubigeo, social_networks, birth_date FROM `general_users` where id = ?;');

    $query -> execute([$_GET['id']]);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $response['status'] = 200;
        $response['message'] = 'Operacion Correcta';
        $response['data'] = $row;
    }else{
        $response['status'] = 200;
        $response['message'] = 'Datos no encontrados';
        $response['data'] = '';
    }

}else{
    $response['status'] = 200;
    $response['message'] = 'Operacion no valida';
    $response['data'] = '';
}
http_response_code($response['status']);
echo json_encode($response, JSON_PRETTY_PRINT);
   
?>