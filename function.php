<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
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
function page_url($page, $params = [])
{
    $url =  BASE_URL . "?p=$page";
    if (is_array($params) && count($params) > 0) {
        foreach ($params as $key => $value) {
            $url .= "&$key=$value";
        }
    }
    return $url;
}
function redirect($page, $params = [])
{
    $url = page_url($page, $params);
    header("Location: $url");
    die();
}

function is_post(){
    return $_SERVER['REQUEST_METHOD'] === 'POST';
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
function get_book_by_id($book_id){
    global $db;

    $book_id = $db->real_escape_string($book_id);

    $result = $db->query("SELECT books.*, users.name ,users.email FROM books  LEFT JOIN users ON books.user_id = users.user_id WHERE books.book_id = $book_id");

    return $result->fetch_assoc();
}
function delete_book_by_id($book_id){
    global $db;

    $book_id = $db->real_escape_string($book_id);

    $sql=$db->prepare("DELETE FROM books where book_id = $book_id");
    $sql->execute();
    $sql->close();
}
function get_book_list($offset = 0,$limit = PAGE_LIMIT) 
{

    global $db;
    
    $sql = "SELECT * FROM books";
    $limit=$db->real_escape_string($limit);
    $offset=$db->real_escape_string($offset);

    $sql .= " LIMIT $limit OFFSET $offset";

    return $db->query($sql);
}
function get_user_books($id){
    global $db;
    $sql = "SELECT * FROM books where `user_id` = $id";

    return $db->query($sql);
}
function get_book_count(){
    global $db;
    $sql = "SELECT count(*) as count FROM books";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    return is_array($row) ? $row['count'] : 0;
}
function log_in_user($id)
{
    $_SESSION['user_id'] = $id;
}

function user_logged_in()
{
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] !== null;
}
function current_user_id(){
    if(!user_logged_in()){
        return null;
    }
    return $_SESSION['user_id'];
}
function current_user()
{
    global $db;

    if (!user_logged_in()) {
        return null;
    }

    $sql = $db->prepare("SELECT * FROM `users` WHERE `user_id` = ?");
    $sql->bind_param('i', $_SESSION["user_id"]);
    $sql->execute();

    return $sql->get_result()->fetch_assoc();
}

function log_out_user()
{
    $_SESSION = [];
    session_destroy();
}
function current_url(){
    $protocol = (isset($_SERVER['HTTPS'])&& $_SERVER['HTTPS']==='on' ? 'https' : 'http'); // check if you use http or https protocol
    return "{$protocol}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}
function gate(){
    if(!user_logged_in()){
        $_SESSION['intended'] = current_url();
        redirect('login');
    }
}