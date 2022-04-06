<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php 


$id = isset($_GET['id']) ? $_GET['id'] : null;
if($id ===null){
    redirect('404');
}
$book = get_book_by_id($_GET['id']);
if($book === null){
    redirect('404');
}

if (is_post()){
       
    $name = trim($_POST['name']);
    $author = trim($_POST['author']);
    $ISBN = trim($_POST['ISBN']);
    $releaseDate = trim($_POST['releaseDate']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);

    require BASE_PATH . '/validations/book-validations.php';

    if(count($errors)==0){
        $image='fe';

        $sql=$db->prepare("UPDATE books set `name` =?, `author` =?, `isbn`=?, `release_date`=?, `price`=?, `description`=?,`image`=? WHERE `book_id`=?");
        $sql->bind_param('ssssissi',$name,$author,$ISBN,$releaseDate,$price,$description,$image,$id);
        $sql->execute();
        $sql->close();
        redirect('edit',['id'=>$id,'success'=>1]);
    }
}
// creates a variable for every key in the array
extract($book, EXTR_SKIP);

$action_url = page_url('edit',['id' => $id]);
?>

<?php if(isset($_GET['success'])):?>
    <div class="alert alert-success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        Book has been updated successfully
    </div>
    <?php endif; ?>

<?php require BASE_PATH . '/views/book-form.php';?>
