<?php 
    // required headers
    header("Access-Control-Allow-Origin: *"); // this will allow all origin 
    header("Content-Type: application/json; charset=UTF-8"); // because i need to response data as json
    header("Access-Control-Allow-Methods: POST"); // methode allow only post request
    header("Access-Control-Max-Age: 3600"); // max age request
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require_once './config.php';
    require_once './Database.php';
    var_dump($config);

    // $con = new Database(new PDO("mysql:host=$config->server;dbname=$config->db", $config->user, $config->password));

    // http_response_code(200);
    // $users=$con->getAllRecords('users');
    // echo json_decode($users);
?>