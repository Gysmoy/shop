<?php
session_start();
if (
    isset($_SESSION['status']) &&
    $_SESSION['status'] == true &&
    isset($_SESSION['type']) &&
    $_SESSION['type'] == 'client' 
) {
    header('Content-Type: json ]');
    $response = [];
    $data = [
        'names' => $_POST['names'],
        'apellidoPaterno' => $_POST['apellidoPaterno'],
        'apellidoMaterno' => $_POST['apellidoMaterno'],
        'ubigeo' => $_POST['ubigeo'],
    ];
    function updateDate($data){
        $_SESSION['user']['names'] = $data['names'];
        $_SESSION['user']['apellidoPaterno'] = $data['apellidoPaterno'];
        $_SESSION['user']['apellidoMaterno'] = $data['apellidoMaterno'];
        $_SESSION['user']['ubigeo'] = $data['ubigeo'];
    };  
    if($data['names'] == null || $data['apellidoPaterno']  == null || $data['apellidoMaterno'] == null || $data['ubigeo']['departamento'] == null || $data['ubigeo']['provincia'] == null || $data['ubigeo']['distrito'] == null || $data['ubigeo']['tipoCalle'] == null || $data['ubigeo']['calle'] == null){
        $response['status'] = 400;
        $response['message'] = 'Datos insuficientes';
        $response['data'] = [];
    }else{
        include_once '../../../assets/php/database.php';
        $db = new Database();
        $query = $db -> connect() -> prepare('UPDATE general_users SET names = ?, lastname1 = ?, lastname2 = ?, ubigeo = ? WHERE id = ?');
        $result = $query -> execute([ $data['names'], $data['apellidoPaterno'], $data['apellidoMaterno'], json_encode($data['ubigeo']), $_SESSION['user']['id']]);
        if ($result){
            $response['status'] = 200;
            $response['message'] = 'Operacion Correcta';
            $response['data'] = [];
            updateDate($data);
        }else{
            $response['status'] = 400;
            $response['message'] = 'No se pudo ejecutar la operacion';
            $response['message1'] = $query -> errorInfo();
            $response['data'] = [];
        }
       
     }
}else{
    $response['status'] = 400;
    $response['message'] = 'La secion a expirado';
    $response['data'] = '';
}
http_response_code($response['status']);
echo json_encode($response, JSON_PRETTY_PRINT);
?>