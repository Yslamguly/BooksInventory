<?php 


$id = isset($_GET['id']) ? $_GET['id'] : null;
if($id ===null){
    redirect('404');
}
$book = get_book_by_id($_GET['id']);
if($book === null){
    redirect('404');
}

?>

<div style="padding-top:25px">The book with id  <?= $id ?> has been created</div>

<h1><?= $book['name']?></h1>