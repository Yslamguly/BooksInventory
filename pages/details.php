<?php 
if(!defined("APP_VERSION")){
    exit;
}
?>
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
<?php require_once "./views/_header.php";?>
<div class="more-info-container" style="background-color:rgb(245, 236, 213)">
        <div class="flex-image">
            <?php if($book['image']): ?>
                    <img class="more-info-box" src="<?= asset("images/uploads/{$book['image']}") ?>" alt="<?= $book['name'];?>">
                <?php else: ?>
                    <img class="box zone" src="https://via.placeholder.com/350x380" alt="<?= $book['name'];?>">    
                <?php endif; ?>

               <div>
                   <h5>Uploaded by <?php echo $book['name']?></h5>
               </div> 
        </div>
        <div class="flex-info">
            <h1><?= $book['name'];?></h1>
            <div class="details">
                <ul>
                    <li>Author: <span style="color: green;"><?= $book['author'];?></span> </li>
                    <li>ISBN: <span> <?= $book['isbn'];?></span> </li>
                    <li>Released year: <span> <?= strlen($book['release_date'])==0 ? 'undefined' : substr($book['release_date'],0,4);?></span> </li>
                    <li>Price: <span> <?= $book['price'];?> $</span> </li>
                    <?php if($book['user_id']==current_user_id()):?>
                        <a href="<?= page_url('edit',['id'=>$book['id']]);?>">
                            edit
                        </a>
                        <a href="#">
                            DELETE
                        </a>
                        <?php endif;?>
                </ul>
            </div>
            <div>
                <h2>Overview</h2>
                <div class="description"><?= $book['description']; ?></div>
            </div>
        </div>
        
    </div>
    <?php 
    //TODO: edit, delete buttons
    // make sure you delete the photo of the product first then the product itself
    ?>

<?php require_once "./views/_footer.php"; ?>
