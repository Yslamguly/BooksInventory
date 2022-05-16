<?php require_once "./views/_header.php";?>

<?php if(count($errors)):?>
    <div class="animate__animated animate__bounceInLeft alert alert-error">
        <?php foreach($errors as $error):?>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <?= $error?>
        <?php endforeach;?>
    </div>
<?php endif;?>

<form action="<?= $action_url; ?>" method="POST" class="form-login">
            <div class="card blue">
                <h1>Sign in</h1>
                <div class="form-group <?= isset($errors['user_email'])? 'has-error' : ''; ?>">
                    <label for="user_email">E-mail</label>
                    <input type="email" name="user_email" class="form-control">
                    <?php if(isset($errors['user_email'])):?>
                        <p class="validation-error">
                            <?= $errors['user_email'][0]; ?>
                        </p>
                    <?php endif; ?>    
                </div>   
                <div class="form-group <?= isset($errors['password'])? 'has-error' : ''; ?>">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php if(isset($errors['password'])):?>
                        <p class="validation-error">
                            <?= $errors['password'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn green">Sign in</button>
                </div>
                <div class="form-group">
                    <p>Not a member? <a href="<?= page_url('register')?>">Sign up</a></p>
                </div>
            </div>
        </form> 