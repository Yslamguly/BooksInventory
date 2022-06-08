<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php require_once "./views/_header.php";?>
<h1>Oh No</h1>
<p>Forbidden access</p>
<a href="<?php echo page_url('home'); ?>">Go back to home page</a>
<?php require_once "./views/_footer.php"; ?>
