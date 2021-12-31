<?php
if(
    isset($_GET['id'])
){
    require_once 'database.php';
    $db = new Database();

    $sql = "SELECT b.name, b.address, b.social, gc.style
    FROM general_config gc INNER JOIN business b ON b.id = gc._business 
     WHERE b.path = :path" ;
    $params = [
        'path' => $_GET['id']
    ];
    $query = $db -> connect() -> prepare($sql);
    $query -> execute($params);
    $row = $query -> fetch(PDO::FETCH_ASSOC);


    $sql1 = "SELECT  c.id, c.name 
    FROM business b INNER JOIN containers c ON b.id = c._business
     WHERE b.path = :path" ;
    $params1 = [
        'path' => $_GET['id']
    ];
    $query1 = $db -> connect() -> prepare($sql1);
    $query1 -> execute($params1);
    $row1 = $query1 -> fetchAll(PDO::FETCH_ASSOC);


    if ($row && $row1) {
        header('Content-Type: json ]');
    
        $row['social'] = json_decode($row['social'],true);
        $row['style'] = json_decode($row['style'], true);
        $row['containers'] = $row1;
        echo json_encode($row);
    }
}else{
    echo 'No exixte el la empresa';
}


























?>