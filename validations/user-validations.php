<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php 
        if($user_name==null){
            $errors['user_name'][]="Name is required";
        }
        else {
            if(strlen($user_name)<2){
                $errors['user_name'][]="The Name must be at least 2 chars";
            }
            if(strlen($user_name)>255){
                $errors['user_name'][]="The Name must be less than 255 chars long";
            }
            if(!(preg_match('~^\p{Lu}~u', $user_name))) {
                $errors['user_name'][]="The name must start with upper case characters";
            }
        }
        // if($db -> errno()){
        //     $errors['email'][]="The Email is required";
        // }

        if($email==null){
            $errors['email'][]="The Email is required";
        }
        else { 
            if(strlen($email)<2){
                $errors['email'][]="The Author name must be at least 2 chars";
            }
            if(strlen($email)>255){
                $errors['email'][]="The Author name must be less than 255 chars long";
            }    
        }
        if($password==null)
        {
            $errors['password'][]="The password is needed";
        } 
        if($password!=$confirm_password){
            $errors['confirm_password'][]="Please, give the same password";
            $errors['password'][] = "";
        }