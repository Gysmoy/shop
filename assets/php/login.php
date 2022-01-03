<?php

if(
    isset($_POST['email']) &&
    isset($_POST['pass']) &&
    isset($_POST['tocken'])
){
    $res = [];
    $res['status'] = '200';
    $res['message'] = 'NTS';
    $res['data'] = [];
    header('Content-Type: json ]');
    require_once 'database.php';

    if($_POST['tocken'] == 'false'){

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
            $res['message'] = 'Usuario ya existe';
            echo json_encode($res);
        }else{
            $res['status'] = '200';
            $res['message'] = 'Usuario no allado';
            echo json_encode($res);
        }
    }else{
        $db = new Database();
        $sql = "INSERT INTO `general_users`( `email`, `password` ) VALUES (:email, :pass)" ;
        $params = [
            'email' => $_POST['email'],
            'pass'  => $_POST['pass']
        ];
        $query = $db -> connect() -> prepare($sql);
        $query -> execute($params);
        $res['status'] = '200';
        $res['message'] = 'Usuario Agregado Correctamente';
        echo json_encode($res);

    }

  
   
}

?>
