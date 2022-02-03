<?php
session_start();
if (
    isset($_SESSION['status']) &&
    $_SESSION['status'] == true &&
    isset($_SESSION['type']) &&
    $_SESSION['type'] == 'client' 
) {

    $response['status'] = 200;
    $response['message'] = 'Operacion Correcta';
    $response['data'] = $_SESSION;

}else{
    $response['status'] = 400;
    $response['message'] = 'La secion a expirado';
    $response['data'] = '';
}
http_response_code($response['status']);
echo json_encode($response, JSON_PRETTY_PRINT);
   
?>