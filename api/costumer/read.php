<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once '../../config/Database.php';
    include_once '../../models/Costumer.php';


    $database = new Database();
    $db = $database->connect();

    $cos = new Costumer($db);

    $res = $cos->read();

    $num = $res->rowCount();

    if($num > 0){
        $cos_arr = array();
        $cos_arr['data'] = array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $cos_item = array( 
                'id' => $id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $phone
            );

            array_push($cos_arr['data'], $cos_item);
        }

        echo json_encode($cos_arr);

    }else{
        echo json_encode(array('message' => 'No Costumer Found'));
    }   
