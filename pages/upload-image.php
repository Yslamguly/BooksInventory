<?php 

header('Content-Type: application/json; charset=UTF-8'); 

$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id == null){
    http_response_code(404);
    $response =['errors'=>['Page not found']];
    $json_response = json_encode($response);
    die($json_response);
}
 