<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once '../../config/Database.php';
    include_once '../../models/Appointement.php';


    $database = new Database();
    $db = $database->connect();

    $ap = new Appointement($db);

    $res = $ap->read();

    $num = $res->rowCount();

    if($num > 0){
        $aps_arr = array();
        $aps_arr['data'] = array();

        while($row = $res->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $ap_item = array( 
                'id' => $id,
                'costumer_id' => $costumer_id,
                'created_at' => $created_at,
                'ends_at' => $ends_at
            );

            array_push($aps_arr['data'], $ap_item);
        }

        echo json_encode($aps_arr);

    }else{
        echo json_encode(array('message' => 'No Appointement Found'));
    }   
