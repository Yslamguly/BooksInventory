<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php 
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
    

        if($isbn==null){
            $errors['isbn'][]="ISBN is required";
        }

        // if($releaseDate==null){
        //     $errors['releaseDate'][]="Release date is needed";
        // } 
        // else{
        //     if(!is_numeric($releaseDate)){
        //         $errors['releaseDate'][]="Release date must be an int";
        //     }
        // }

        if($price==null)
        {
            $errors['price'][]="The price is needed";
        } 
        else
        {
            if(!is_numeric($price))
            {
                $errors['price'][]="The price must be an int";
            }
        }

        if($description == null)
        {
            $errors['description'][]="The description is required";
        }
        else
        {
            if(strlen($description) < 100)
            {
                $errors['description'][]="The description must be more descriptive";
            }
        }