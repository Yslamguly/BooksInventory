<?php 
if(!defined("APP_VERSION")){
    exit;
}
?>

<?php 
$errors=[];

if (is_post()){
    $email = trim($_POST['user_email']);
    $password = trim($_POST['password']);

    $sql = $db->prepare("SELECT * FROM users WHERE user_email = ?");
    $sql->bind_param('s', $email);
    //die_dump($sql);
    $sql->execute();

    $result = $sql->get_result();
    //die_dump($result);

    if ($user_name = $result->fetch_assoc()) {
        if (!password_verify($password, $user_name['password'])) {
            $errors[] = 'The given credentials do not match';
        }
    } else {
        $errors[] = 'The given credentials dont match';
    }

    if (count($errors) == 0) {
        log_in_user($user_name['user_id']);
        //die_dump(current_user());
        redirect('home');
        //die_dump('ok');
    }

}






require BASE_PATH . '/views/login-form.php'; 

?>