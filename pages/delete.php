<?php 
if(!defined("APP_VERSION")){
    exit;
}
gate();
?>
<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
if($id ===null){
    redirect('404');
}
$book = get_book_by_id($id);

if($book === null){
    redirect('404');
}
if($book['user_id']==current_user_id()){
    $sql=$db->prepare("DELETE FROM books where book_id = ?");
    $sql->bind_param('i',$id);
    $sql->execute();
    $sql->close();
    redirect('my_books');
}

