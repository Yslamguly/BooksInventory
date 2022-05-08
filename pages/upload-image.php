<?php 

header('Content-Type: application/json; charset=UTF-8'); 

$id = isset($_GET['id']) ? $_GET['id'] : null;

if($id == null){
    http_response_code(404);
    $response =['errors'=>['Page not found']];
    $json_response = json_encode($response);
    die($json_response);
}
 
$album = get_book_by_id($id);

if($album == null){ //if album is not found in the database
    http_response_code(404);
    $response =['errors'=>['Album not found']];
    $json_response = json_encode($response);
    die($json_response);
}
// || $_FILES['image']['size']<= 0
$errors=[];
// if(!isset($_FILES['image']) || $_FILES['image']['size']<= 0){
//     http_response_code(400); //bad request
//     die(json_encode(['errors'=>['Cover image is required']]));
// }

$target_dir = BASE_PATH . '/images/uploads/';
//die($target_dir);
$targer_file = $target_dir . basename($_FILES['image']['name']);
//die($targer_file);
$image_file_type = strtolower(pathinfo($targer_file, PATHINFO_EXTENSION));

$is_image =getimagesize($_FILES['image']['tmp_name']);
if($is_image == false){
    $errors[] = "The sepcified file is not an image. File type: {$check['mime']}.";
}

if(file_exists($targer_file)){
    $errors[] = "The sepcified file already exists";
}

if($_FILES['image']['size'] > (MAX_IMAGE_SIZE * 1000000)){
    $errors[] = "The image size can not be greater than" . MAX_IMAGE_SIZE . "MB.";
}
$allowed_formats = ['jpg', 'jpeg','img', 'png', 'gif','svg'];

if(!in_array($image_file_type, $allowed_formats)){
    $errors = "The selected file format is not allowed.Try these: " .implode(", ", $allowed_formats);
}

if(count($errors) > 0){
    http_response_code(400);
    die(json_encode(['errors'=>$errors]));
}

if(!move_uploaded_file($_FILES['image']['tmp_name'], $targer_file)){
    http_response_code(500);
    die(json_encode(['errors'=>['Something went wrong']])) ;
}

$sql = $db->prepare("UPDATE books SET `image` = ? WHERE `book_id` = ?");
$sql->bind_param('si',$_FILES['image']['name'],$id);
$sql->execute();
$sql->close();

$json = [
    'image_url'=> asset('images/uploads/' . $_FILES['image']['name']),
    'message'=> 'Image uploaded successfully',
];
http_response_code(200);
die(json_encode($json));