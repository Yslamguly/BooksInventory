<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php require_once "./views/_header.php";?>
<div class="vertical-center">
		<div class="container">
			<div id="text-404">
				<h1>😮</h1>
				<h2>Oops! 403 Error! Forbidden access!</h2>
				<p>Sorry but you are not able to perform this action.</p>
				<a href="<?php echo page_url('home');?>">Back to homepage</a>
			</div>
		</div>
</div>

