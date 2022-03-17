<!--
    Name,Author,ISBN,ReleaseDate,Price,desciption
-->
<?php  

$errors=[];

    if (is_post()){
       
        $name = trim($_POST['name']);
        $author = trim($_POST['author']);
        $ISBN = trim($_POST['ISBN']);
        $releaseDate = trim($_POST['releaseDate']);
        $price = trim($_POST['price']);
        $description = trim($_POST['description']);

        if($name==null){
            $errors['name'][]="Name is required";
        }
        else {
            if(strlen($name)<2){
                $errors['name'][]="The Name must be at least 2 chars";
            }
            if(strlen($name)>255){
                $errors['name'][]="The Name must be less than 255 chars long";
            } 
        }
        

        if($author==null){
            $errors['author'][]="The Author is required";
        }
        else { 
            if(strlen($author)<2){
                $errors['author'][]="The Author name must be at least 2 chars";
            }
            if(strlen($author)>255){
                $errors['author'][]="The Author name must be less than 255 chars long";
            }    
        }
    

        if($ISBN==null){
            $errors['ISBN'][]="ISBN is required";
        }

        // if($releaseDate==null){
        //     $errors['releaseDate'][]="Release date is needed";
        // } 
        // else{
        //     if(!is_numeric($releaseDate)){
        //         $errors['releaseDate'][]="Release date must be an int";
        //     }
        // }

        if($price==null){
            $errors['price'][]="The price is needed";
        } 
        else{
            if(!is_numeric($price)){
                $errors['price'][]="The price must be an int";
            }
        }

        if($description == null){
            $errors['description'][]="The description is required";
        }
        else{
            if(strlen($description) < 100){
                $errors['description'][]="The description must be more descriptive";
            }
        }
        
        if(count($errors)==0){
             //TODO: save values in the database
            //TODO: success message
            die_dump($_POST);
            
        }
        //die_dump($errors);
    } 

?>
<div class="container">
    <form class="card blue" action="/test/?p=upload" method="POST">
        <div class="form-group <?php echo isset($errors['name'])? 'has-error' : ''; ?>">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>">
            <?php if(isset($errors['name'])):?>
                <p class="validation-error">
                    <?php echo $errors['name'][0]; ?>
                </p>
            <?php endif; ?>    
        </div>   
        <div class="form-group <?php echo isset($errors['author'])? 'has-error' : ''; ?>">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="<?php echo isset($author) ? $author : ''; ?>">
            <?php if(isset($errors['author'])):?>
                <p class="validation-error">
                    <?php echo $errors['author'][0]; ?>
                </p>
            <?php endif; ?> 
        </div>
        <div class="form-group <?php echo isset($errors['ISBN'])? 'has-error' : ''; ?>">
            <label for="ISBN">ISBN</label>
            <input type="text" name="ISBN" class="form-control" value="<?php echo isset($ISBN) ? $ISBN : ''; ?>">
            <?php if(isset($errors['ISBN'])):?>
                <p class="validation-error">
                    <?php echo $errors['ISBN'][0]; ?>
                </p>
            <?php endif; ?> 
        </div>
        <div class="form-group <?php echo isset($errors['releaseDate'])? 'has-error' : ''; ?>">
            <label for="releaseDate">Release Date</label>
            <input type="date" name="releaseDate" class="form-control" value="<?php echo isset($releaseDate) ? $releaseDate : ''; ?>"> <!--ask-->
            <?php if(isset($errors['releaseDate'])):?>
                <p class="validation-error">
                    <?php echo $errors['releaseDate'][0]; ?>
                </p>
            <?php endif; ?> 
        </div>    
        <div class="form-group <?php echo isset($errors['price'])? 'has-error' : ''; ?>">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" value="<?php echo isset($price) ? $price : ''; ?>">
            <?php if(isset($errors['price'])):?>
                <p class="validation-error">
                    <?php echo $errors['price'][0]; ?>
                </p>
            <?php endif; ?> 
        </div>
        <div class="form-group <?php echo isset($errors['description'])? 'has-error' : ''; ?>">
            <label for="desciption">Desciption</label>
            <textarea name="description" class="form-control"><?php echo isset($description) ? $description : ''; ?></textarea>
            <?php if(isset($errors['description'])):?>
                <p class="validation-error">
                    <?php echo $errors['description'][0]; ?>
                </p>
            <?php endif; ?> 
        </div>
        <div>
            <button type="submit" class="btn green">Upload</button>
        </div>
    </form> 
</div>