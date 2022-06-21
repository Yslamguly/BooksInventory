<?php 
if(!defined("APP_VERSION")){
    exit;
}
gate();
?>



<?php 

$user_id = current_user_id();

$user_books = get_user_books($user_id);

?>
<?php require_once "./views/_header.php";?>




<?php if(empty($user_books)):?>
    <h1>You have no books</h1>
<?php else: ?>
    <div class="container my-books-upper-container">
        <h1>Books Table</h1>
        <div class="container my-books-text-container">
            <p class="text">
                We are one of the largest web-sites devoted for book. We are delighted to provide services for you in order to make people discover the best and make this world better.
            </p>
        </div>
       
    </div>
    <div class="container container-table">
        <table class="content-table">
            <thead class="">
                <tr>
                    <th>Name</th>
                    <th>Author</th> 
                    <th>ISBN</th>
                    <th>Release date</th>
                    <th></th>
                    <th></th>
                    <th><a style="width:30px;height:30px;text-align:right;font-size:25px" href="<?= page_url('upload')?>" class="btn btn-form btn-add">+</a></th>
                </tr>
            </thead>
            <tbody>
            <?php while($book=$user_books->fetch_assoc()): ?>
                <tr>
                    <td><?= $book['name']?></td>
                    <td><?= $book['author']?></td> 
                    <td><?= $book['isbn']?></td>   
                    <td><?= $book['release_date']?></td> 
                    <td><a href="<?= page_url('edit',['id'=>$book['book_id']]);?>" class="btn green btn-table">Edit</a></td>
                    <td><a <?= "onClick=\"javascript: return confirm('Please confirm deletion');\""?>  href="<?= page_url('delete',['id'=>$book['book_id']]);?>" class="btn red btn-table">Delete</a></td>
                    <td><a href="<?= page_url('details',['id'=>$book['book_id']]);?>" class="btn blue btn-table">More</a></td>
                </tr>
            <?php endwhile;?>
            </tbody>
        </table>
        <div>
            <a href="<?= page_url('upload')?>" class="btn btn-form btn-add green">ADD NEW BOOK</a>
        </div>
    </div>
<?php endif;?>

<?php require_once "./views/_footer.php"; ?>


