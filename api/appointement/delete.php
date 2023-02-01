<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
    
    include_once '../../config/Database.php';
    include_once '../../models/Appointement.php';


    $database = new Database();
    $db = $database->connect();

    $ap = new Appointement($db);

    $data = json_decode(file_get_contents("php://input"));

    $ap->id = $data->id;

    if($ap->delete()){
        echo json_encode(array('message' => 'Appointement Deleted'));
    }else{
        echo json_encode(array('message' => 'Appointement Not Deleted'));
    }