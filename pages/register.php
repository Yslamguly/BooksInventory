<?php 
if(!defined("APP_VERSION")){
    exit;
}?>
<?php 

if(is_post()){ 
    $user_name = trim($_POST['user_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    require BASE_PATH . '/validations/user-validations.php';
    if(count($errors) == 0){
        
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = $db->prepare("INSERT INTO users (`name`,`user_email`,`password`) VALUES (?, ?, ?)");
        $sql->bind_param('sss',$user_name,$email,$encrypted_password);
        $sql->execute();
        $sql->close();

        //NEW: After registration the user will be automatically looged in
        $sql = $db->prepare("SELECT * FROM `users` WHERE `user_email` = ?");
        $sql->bind_param('s', $email);
        $sql->execute();

        $result = $sql->get_result();
        $user_name = $result->fetch_assoc();
        if (count($errors) == 0) {
            log_in_user($user_name['user_id']);
            redirect('home');
        }

    }
}
require BASE_PATH . '/views/register-form.php';