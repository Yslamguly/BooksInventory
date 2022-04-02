<?php

require_once "config.php";
require_once "function.php";

$db = db_connect();
//die_dump(page_url('details',['id'=>5]));
//if $_GET has 'p' then assign it to $page else assign 'home'
$page = isset($_GET['p']) ? $_GET['p'] : 'home';
//$page = ($_GET['p']) ?? 'home';

require_once "./views/_header.php";
if (file_exists("./pages/{$page}.php"))
{
    include "./pages/{$page}.php";
}else{
    include "./pages/404.php";
}

require_once "./views/_footer.php"; 
    

db_close($db_conn);