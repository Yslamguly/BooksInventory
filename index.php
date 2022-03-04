<?php

include_once("function.php");

$page = isset($_GET['p']) ? $_GET['p'] : 'home';

include_once "./views/_header.php";
if (file_exists("./pages/{$page}.php"))
{
    include "./pages/{$page}.php";
}else{
    include "./pages/404.php";
}

include_once "./views/_footer.php"; 
    