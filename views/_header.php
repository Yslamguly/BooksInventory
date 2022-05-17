<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libri</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="<?= asset('css/app.css'); ?>">
</head>
<body>
    <header>
            <div class="blue topnav">
                    <a href="<?= page_url('home'); ?>">Home</a>
                    <a href="<?= page_url('about'); ?>">About</a>
                    <?php if(user_logged_in()):?>
                        <a href="<?= page_url('upload'); ?>">Upload</a>
                    <?php endif;?>
                    <div class="topnav-right">
                        <?php if(user_logged_in()) : ?>
                            <a href="#" style="background-color: rgb(239,214,121); color: rgb(112, 158, 233); "><?= current_user()['name']; ?></a>
                            <a href="<?= page_url('logout');?>">Sign out</a> 
                        <?php else : ?>
                                <a href="<?= page_url('register'); ?>">Register</a>
                                <a href="<?= page_url('login');?> ">Login</a>
                        <?php endif; ?>
                    </div>
            </div>
     </header>
     <main>
     <!-- <div class="container zone blue">
        <img src="images/Open_book_nae_02.svg.png">
        <h1>Libri</h1>
    </div> -->
         <!-- TODO Main content comes here-->
