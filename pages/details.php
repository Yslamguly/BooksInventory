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

?>
<?php require_once "./views/_header.php";?>
<div class="more-info-container" style="background-color:rgb(245, 236, 213)">
        <div class="flex-image">
            <?php if($book['image']): ?>
                    <img class="more-info-box" src="<?= asset("images/uploads/{$book['image']}") ?>" alt="<?= $book['name'];?>">
                <?php else: ?>
                    <img class="box zone" src="https://via.placeholder.com/350x380" alt="<?= $book['name'];?>">    
                <?php endif; ?>

        </div>
        <div class="flex-info">
            <h1><?= $book['name'];?></h1>
            <div class="details">
                <ul>
                    <li>Author: <span style="color: green;"><?= $book['author'];?></span> </li>
                    <li>ISBN: <span> <?= $book['isbn'];?></span> </li>
                    <li>Released year: <span> <?= strlen($book['release_date'])==0 ? 'undefined' : substr($book['release_date'],0,4);?></span> </li>
                    <li>Price: <span> <?= $book['price'];?> $</span> </li>
                </ul>
            </div>
            <div>
                <h2>Overview</h2>
                    <div class="overview">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente natus id fugiat enim laboriosam debitis eum autem illum incidunt iure, non nulla quidem voluptatem quam sequi molestiae recusandae rem nemo.
                        </p>
                    </div>
            </div>
        </div>
        
    </div>

<?php require_once "./views/_footer.php"; ?>
