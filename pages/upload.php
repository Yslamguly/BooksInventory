<!--
    Name,Author,ISBN,ReleaseDate,Price,desciption
-->
<?php  

$errors=[];

    if (is_post()){
        //TODO: validate 
        //TODO: save values in the database
        //TODO: success message
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $isbn = trim($_POST['isbn']);
        $releaseDate = trim($_POST['releaseDate']);
        $price = trim($_POST['price']);
        $description = trim($_POST['description']);

        if($name==null){
            $errors['name'][]="Name is required";
        }else if(strlen($name)<2){
            $errors['name'][]="The Name must be at least 2 chars";
        }

        die_dump($errors);
        die_dump($_POST);
    } 

?>
<div class="page page-upload">
    <form class="card" action="/test/?p=upload" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>   
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
            <label for="ISBN">ISBN</label>
            <input type="text" name="ISBN" class="form-control">
        </div>
        <div class="form-group">
            <label for="releaseDate">Release Date</label>
            <input type="date" name="releaseDate" class="form-control"> <!--ask-->
        </div>    
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="desciption">Desciption</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div>
            <button type="submit" class="btn">Upload</button>
        </div>
    </form> 
</div>