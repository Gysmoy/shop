<?php
    
    include_once '../../../assets/php/database.php';
    $db = new Database();
    $query = $db -> connect() -> prepare('SELECT ubigeo, social_networks FROM `general_users` where id = 18;');
    $query -> execute();
    $row = $query -> fetch(PDO::FETCH_ASSOC);
    if ($row) {
       $res1= json_decode($row['ubigeo'], true);
       
       print_r($res1['provincia']); 
        
    }else{
        echo 'No ay datos';
    }

   
?>