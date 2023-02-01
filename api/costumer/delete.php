<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/Costumer.php';


    $database = new Database();
    $db = $database->connect();

    $cos = new Costumer($db);

    $data = json_decode(file_get_contents("php://input"));

    $cos->id = $data->id;

    if($cos->delete()){
        echo json_encode(array('message' => 'Costumer Deleted'));
    }else{
        echo json_encode(array('message' => 'Costumer Not Deleted'));
    }