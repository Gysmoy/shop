<?php
if(
    isset($_GET['id'])
){
    require_once 'database.php';
    $db = new Database();
    // Obteniendo data de Business
    $query = $db -> connect() -> prepare('SELECT
        b.name, b.address, b.social AS socials, gc.style
    FROM general_config gc
    INNER JOIN business b ON b.id = gc._business 
    WHERE b.path = :path
    ');
    $query -> execute([
        'path' => $_GET['id']
    ]);
    $business = $query -> fetch(PDO::FETCH_ASSOC);

    // Obteniendo data de Containers
    $query = $db -> connect() -> prepare('SELECT
        c.id, c.name, COUNT(d.id) AS dishes
    FROM dishes d
    INNER JOIN containers c ON c.id = d._container
    JOIN business b ON b.id = c._business
    WHERE b.path = :path
    GROUP BY id
    ');
    $query -> execute([
        'path' => $_GET['id']
    ]);
    $containers = $query -> fetchAll(PDO::FETCH_ASSOC);

    if ($business && $containers) {
        $business['socials'] = json_decode($business['socials'], true);
        $business['style'] = json_decode($business['style'], true);
        $business['containers'] = $containers;
        
        $data = $business;
    } else {
        http_response_code(400);
        $data = [
            'msg' => 'Esta empresa no se encuentra disponible'
        ];
    }
} else {
    http_response_code(400);
    $data = [
        'msg' => 'Se necesita un dominio para acceder'
    ];
}
header('Content-Type: application/json');
echo json_encode($data);
?>