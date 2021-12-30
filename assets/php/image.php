<?php
if(
    isset($_GET['type']) &&
    isset($_GET['id'])
){
    require_once 'database.php';
    $db = new Database();
    switch ($_GET['type']) {
        case 'logo':
            $sql = "SELECT 
                gc.logo_image AS 'image',
                gc.logo_type AS 'type'
            FROM general_config gc
            INNER JOIN business b ON b.id = gc._business
            WHERE b.path = :path
            ";
            $params = [
                'path' => $_GET['id']
            ];
            break;
        case 'background':
            $sql = "SELECT 
                gc.bg_image AS 'image',
                gc.bg_type AS 'type'
            FROM general_config gc
            INNER JOIN business b ON b.id = gc._business
            WHERE b.path = :path
            ";
            $params = [
                'path' => $_GET['id']
            ];
            break;
        case 'container':
            # code...
            break;
        default:
            # code...
            break;
    }
    $query = $db -> connect() -> prepare($sql);
    $query -> execute($params);
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
        header('Content-Type: ' . $row['type']);
        echo $row['image'];
    }
} else {
    echo 'Se require un id para mostrar una imagen';
}
?>