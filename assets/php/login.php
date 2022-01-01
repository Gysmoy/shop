<?php

if(
    isset($_POST['email']) &&
    isset($_POST['pass'])
){
    require_once 'database.php';
    $db = new Database();
    $sql = "INSERT INTO `general_users`( `email`, `password` ) VALUES (:email, :pass)" ;
    $params = [
        'email' => $_POST['email'],
        'pass'  => $_POST['pass']
    ];
    $query = $db -> connect() -> prepare($sql);
    $query -> execute($params);
}




?>
