<?php

if(
    isset($_POST['email']) &&
    isset($_POST['pass']) 
){
    $res = [];
    $res['status'] = '200';
    $res['message'] = 'NTS';
    $res['data'] = [];
    header('Content-Type: json ]');
    require_once '../../../assets/php/database.php';
    $pass =hash('sha256', $_POST['pass']);

    $db = new Database();
    $sql = "INSERT INTO `general_users`( `email`, `password` ) VALUES (:email, :pass)" ;
    $params = [
        'email' => $_POST['email'],
        'pass'  => $pass
    ];
    $query = $db -> connect() -> prepare($sql);
    $query -> execute($params);
    $res['status'] = '200';
    $res['message'] = 'Usuario Agregado Correctamente';
    echo json_encode($res);
}

?>
