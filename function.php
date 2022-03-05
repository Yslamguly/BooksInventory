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