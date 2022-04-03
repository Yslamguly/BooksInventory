<?php
    $current_page=isset($_GET['page'])?$_GET['page'] : 1;
    $limit=($current_page-1) * PAGE_LIMIT;
    $books=get_book_list($limit);

    $total_pages = ceil(get_book_count()/PAGE_LIMIT);
?>

<div class="container">
    <div>
        <img class="cover" src="images/Open_book_nae_02.svg.png">
        <h1>Libri</h1>
    </div>
</div>

<div class="zone blue grid-wrapper">
    <?php while($book=$books->fetch_assoc()): ?>

        <div class="book-item">
            <a href="<?= page_url('details',['id'=>$book['book_id']]);?>">
                <img class="box zone" src="<?= $book['image']; ?>" alt="<?= $book['name'];?>">
                <p><?= $book['name'];?> (<?= strlen($book['release_date'])==0 ? 'undefined' : substr($book['release_date'],0,4);?>)</p>
            </a>
        </div>
    <?php endwhile;?>
</div>
<nav class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
        <a href="<?= page_url('home', ['page' => $i]); ?>" 
            <?= $i == $current_page ? 'class="active"' : ''; ?>>
            <?= $i; ?>
        </a>
    <?php endfor; ?>
</nav>
