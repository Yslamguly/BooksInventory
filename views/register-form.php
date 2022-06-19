<?php require_once "./views/_header.php";?>

<div id="upload-response"></div>

<form action="<?= $action_url; ?>" method="POST" id="register-form" class="form-register">
            <div class="card blue">
                <h1>Sign up</h1>
                <div class="form-group <?= isset($errors['user_name'])? 'has-error' : ''; ?>">
                    <label for="user_name">Name</label>
                    <input type="text" name="user_name" class="form-control" value="<?= isset($user_name) ? $user_name : ''; ?>">
                    <?php if(isset($errors['user_name'])):?>
                        <p class="validation-error">
                            <?= $errors['user_name'][0]; ?>
                        </p>
                    <?php endif; ?>    
                </div>   
                <div class="form-group <?= isset($errors['email'])? 'has-error' : ''; ?>">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" value="<?= isset($email) ? $email : ''; ?>">
                    <?php if(isset($errors['email'])):?>
                        <p class="validation-error">
                            <?= $errors['email'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group <?= isset($errors['password'])? 'has-error' : ''; ?>">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" value="">
                    <?php if(isset($errors['password'])):?>
                        <p class="validation-error">
                            <?= $errors['password'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group <?= isset($errors['confirm_password'])? 'has-error' : ''; ?>">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value=""> <!--ask-->
                    <?php if(isset($errors['confirm_password'])):?>
                        <p class="validation-error">
                            <?= $errors['confirm_password'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>    
                <div class="form-group">
                    <button type="submit" class="btn btn-form green">Sign up</button>
                </div>
                <div class="form-group">
                    <p>Already a member? <a href="<?= page_url('login')?>">  Sign in</a></p>
                </div>
            </div>
</form> 
