<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/Costumer.php';


    $database = new Database();
    $db = $database->connect();

    $cos = new Costumer($db);

    $data = json_decode(file_get_contents("php://input"));

    $cos->first_name = $data->first_name;
    $cos->last_name = $data->last_name;
    $cos->phone = $data->phone;

    if($cos->create()){
        echo json_encode(array('message' => 'Costumer Created'));
    }else{
        echo json_encode(array('message' => 'Costumer Not Created'));
    }