<?php
if(
    isset($_GET['id']) 
){
 

    require_once 'database.php';
    $db = new Database();

    $sql = "SELECT d.id ,d.name , d.description, d.update_at, d.price, d.stock
    FROM containers c INNER JOIN dishes d ON c.id = d._container
     WHERE c.id = :id" ;
    $params = [
        'id' => $_GET['id']
    ];
    $query = $db -> connect() -> prepare($sql);
    $query -> execute($params);
    $row = $query -> fetchAll(PDO::FETCH_ASSOC);

    if ($row) {
        header('Content-Type: json ]');
        echo json_encode($row);
    }


}



?>