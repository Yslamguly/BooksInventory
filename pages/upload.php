<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php  

$errors=[];

    if (is_post()){
       
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $isbn = trim($_POST['isbn']);
        $releaseDate = trim($_POST['releaseDate']);
        $price = trim($_POST['price']);
        $description = trim($_POST['description']);

        require BASE_PATH . '/validations/book-validations.php';
        
        if(count($errors)==0){
            // save values in the database
            // success message

            //todo to change this later
            //$image='fe';
            $sql = $db->prepare("INSERT INTO books (`name`,`author`,`isbn`,`release_date`,`price`,`description`) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param('ssssis',$name,$author,$isbn,$releaseDate,$price,$description);
            $sql->execute();
            //die_dump($sql->sqlstate);
            //die_dump($sql);
            $sql->close();
            
            $new_id = $db -> insert_id;

            redirect('edit',['id' => $new_id]);
        }
    } 
    $action_url = page_url('upload');

    require BASE_PATH . '/views/book-form.php';

?>
<!-- <div class="container zone">
    <h1>Upload your book</h1>
</div> -->
        