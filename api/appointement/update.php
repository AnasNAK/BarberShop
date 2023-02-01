<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/Appointement.php';


    $database = new Database();
    $db = $database->connect();

    $ap = new Appointement($db);

    $data = json_decode(file_get_contents("php://input"));

    $ap->id = $data->id;
    $ap->costumer_id = $data->costumer_id;
    $ap->created_at = $data->created_at;
    $ap->ends_at = $data->ends_at;

    if($ap->update()){
        echo json_encode(array('message' => 'Appointement Updated'));
    }else{
        echo json_encode(array('message' => 'Appointement Not Updated'));
    }