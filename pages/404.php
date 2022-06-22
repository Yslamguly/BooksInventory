<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php require_once "./views/_header.php";?>

<div class="vertical-center">
		<div class="container">
			<div id="text-404">
				<h1>😮</h1>
				<h2>Oops! 404 Error! Page Is Not Found</h2>
				<p>Sorry but the page you are looking for does not exist.</p>
				<a href="<?php echo page_url('home');?>">Back to homepage</a>
			</div>
		</div>
</div>
