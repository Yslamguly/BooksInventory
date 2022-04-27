<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php
define('BASE_URL', 'http://localhost:8888/Test/');

define('BASE_PATH',__DIR__);
define('DEBUG',true);

/**Database settings */
define('DB_HOST', '127.0.0.1:3306');
define('DB_USER', 'root');
define('DB_PASS', 'drogba11');
define('DB_NAME', 'booksdb');


define('PAGE_LIMIT',8);

define('MAX_IMAGE_SIZE',5);