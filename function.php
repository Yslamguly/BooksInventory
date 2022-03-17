<?php

function die_dump($variable){
    dump($variable);
    die("END");
}

function dump($variable)
{
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}

function asset($asset){
    return BASE_URL . $asset;
}
function page_url($page){
    return BASE_URL . "?p=$page";
}

function is_post(){
    return ($_SERVER['REQUEST_METHOD'])=== 'POST';
}

function db_connect()
{
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        if (DEBUG) {
            die("Connection failed: {$conn->connect_error}");
        }
        die("Connection failed");
    }

    return $conn;
}


function db_close($db)
{
    $db->close();
}


// function max_length($length){

// }