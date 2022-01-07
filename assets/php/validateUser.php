<?php

if(
    isset($_POST['email']) 
){
    $res = [];
    $res['status'] = '200';
    $res['message'] = 'NTS';
    $res['data'] = [];
    header('Content-Type: json ]');
    require_once 'database.php';
    $db = new Database();
    $sql1 = "SELECT email FROM general_users WHERE email = :email1;";
    $params1 = [
        'email1' => $_POST['email']
    ];
    $query1 = $db -> connect() -> prepare($sql1);
    $query1 -> execute($params1);
    $row1 = $query1 -> fetch(PDO::FETCH_ASSOC);
    if ($row1){
        $res['status'] = '400';
        $res['message'] = 'Este usuario ya existe';
        echo json_encode($res);
    }else{
        $res['status'] = '200';
        $res['message'] = 'Su usuario se esta registrando...';
        echo json_encode($res);
    }
}

?>
