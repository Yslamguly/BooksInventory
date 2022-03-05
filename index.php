<?php

include_once "config.php";
include_once "function.php";

//if $_GET has 'p' then assign it to $page else assign 'home'
//$page = isset($_GET['p']) ? $_GET['p'] : 'home';
$page = ($_GET['p']) ?? 'home';

include_once "./views/_header.php";
if (file_exists("./pages/{$page}.php"))
{
    include "./pages/{$page}.php";
}else{
    include "./pages/404.php";
}

include_once "./views/_footer.php"; 
    