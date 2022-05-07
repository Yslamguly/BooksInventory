<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php 


$id = isset($_GET['id']) ? $_GET['id'] : null;
if($id ===null){
    redirect('404');
}
$book = get_book_by_id($id);

if($book === null){
    redirect('404');
}

if (is_post()){
       
    $name = trim($_POST['name']);
    $author = trim($_POST['author']);
    $isbn = trim($_POST['isbn']);
    $releaseDate = trim($_POST['releaseDate']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);

    require BASE_PATH . '/validations/book-validations.php';

    if(count($errors)==0){
        $image='fe';

        $sql=$db->prepare("UPDATE books set `name`=?, `author`=?, `isbn`=?, `release_date`=STR_TO_DATE(?,'%Y-%m-%d'), `price`=?, `description`=?,`image`=? WHERE `book_id`=?");
        $sql->bind_param('ssssissi',$name,$author,$isbn,$releaseDate,$price,$description,$image,$id);
        $sql->execute();
        //die_dump($sql);
        $sql->close();
        redirect('edit',['id'=>$id,'success'=>1]);
    }
}
// creates a variable for every key in the array
extract($book, EXTR_SKIP);


$action_url = page_url('edit', ['id' => $id]);
$image_upload_url = page_url('upload-image', ['id' => $id]);
?>




<?php require_once "./views/_header.php";?>

<div id="upload-response"></div>

<!-- <?php if(isset($_GET['success'])):?>
    <div class="animate__animated animate__bounceInLeft alert alert-success">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        Book has been updated successfully
    </div>
    <?php endif; ?> -->

<?php require BASE_PATH . '/views/book-form.php';?>

<form id="upload-image" action="<?= $image_upload_url; ?>" method="POST" enctype="multipart/form-data">
    <div class="card blue">
        <div class="form-group">
            <h1 style="font-size:25px;padding-bottom:1rem;">Upload cover for <?= $book['name'];?></h1>
                <label>Cover image</label>
                <input type="file" name="image" class="form-control"/>
        </div>   
        <div class="form-group">
            <button type="submit" class="btn green">Upload</button>
        </div>
    </div>
</form> 
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="<?= asset('js/upload-image.js');?>"></script>

