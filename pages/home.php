<?php
    $books=get_book_list();
?>

<div class="container"><img class="cover" src="images/books-1673578_1280.png"></div>

<div class="zone blue grid-wrapper">
    <?php while($book=$books->fetch_assoc()): ?>

        <div class="book-item">
            <img class="box zone" src="<?= $book['image']; ?>" alt="<?= $book['name'];?>">
            <p><?= $book['name'];?> (<?= strlen($book['release_date'])==0 ? 'undefined' : substr($book['release_date'],0,4);?>)</p>
        </div>
    <?php endwhile;?>

</div>
