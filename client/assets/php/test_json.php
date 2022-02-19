<?php

$data = [
    '1'=>'1',
    '2'=> null,
    '3'=>'3',
    '4'=>null,
    '5'=>'5',
    '6'=>null
];
$nulls = [];
foreach($data as $key => $value){
    if ($value == ""){
        array_push($nulls, $key);
    }
};
echo json_encode($nulls);
    /*
    echo json_encode($data);
    
    if ($res == null){
        array_push($nulls, );
    }*/
//}
//echo json_encode($nulls);

    /*
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
*/
   
?>