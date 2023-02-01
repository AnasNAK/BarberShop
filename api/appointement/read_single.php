<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    
    include_once '../../config/Database.php';
    include_once '../../models/Appointement.php';


    $database = new Database();
    $db = $database->connect();

    $ap = new Appointement($db);

    $ap->id = isset($_GET['id']) ? $_GET['id'] : die();

    $ap->read_single();

    $ap_arr = array(
        'id' => $ap->id,
        'costumer_id' => $ap->costumer_id,
        'created_at' => $ap->created_at,
        'ends_at' => $ap->ends_at
    );
    print_r(json_encode($ap_arr));