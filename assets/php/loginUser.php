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
    require_once 'database.php';

    $db = new Database();
    $sql = "SELECT email, password from `general_users` WHERE email = :email and password = :pass" ;
    $params = [
        'email' => $_POST['email'],
        'pass'  => $_POST['pass']
    ];
    $query = $db -> connect() -> prepare($sql);
    $query -> execute($params);
    $row = $query -> fetchAll(PDO::FETCH_ASSOC);
    if ($row){
        $res['status'] = '200';
        $res['message'] = 'Credenciales correctas';
        echo json_encode($res);
    }else{
        $res['status'] = '400';
        $res['message'] = 'Credenciales incorrectas';
        echo json_encode($res);
    }
}

?>
