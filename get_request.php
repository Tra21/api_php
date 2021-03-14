<?php
    // required headers
    header("Access-Control-Allow-Origin: *"); // this will allow all origin 
    header("Content-Type: application/json; charset=UTF-8"); // because i need to response data as json
    header("Access-Control-Allow-Methods: GET"); // methode allow only post request
    header("Access-Control-Max-Age: 3600"); // max age request
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    //so we still using config.php and Database.php 
    //so let's import it
    require_once './config.php';
    require_once './Database.php';
    //I will not explain more because I already explain on ep1 already
    // so let's go to getAllRecords method 
    if(!isset($_GET['get_data'])==false){
        //I already explain on ep1 
        $con = new Database(new PDO("mysql:host=".$config['server'].";dbname=".$config['db']."", $config['user'], $config['password']));
    
        http_response_code(200);
        $users=$con->getAllRecords('users','*', '&& '.$_GET['get_data'], '', '');//it's more paramaters so let's to database.php
        echo json_encode(count($users)>0?$users:['success'=>'no data available']);
        
    }else{
         http_response_code(412);
         $response = json_encode(['success'=>'no data available']);
         echo $response;
    }

?>