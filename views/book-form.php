<?php require_once "./views/_header.php";?>
<form action="<?= $action_url; ?>" method="POST">
            <div class="card blue">
                <div class="form-group <?= isset($errors['name'])? 'has-error' : ''; ?>">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= isset($name) ? $name : ''; ?>">
                    <?php if(isset($errors['name'])):?>
                        <p class="validation-error">
                            <?= $errors['name'][0]; ?>
                        </p>
                    <?php endif; ?>    
                </div>   
                <div class="form-group <?= isset($errors['author'])? 'has-error' : ''; ?>">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control" value="<?= isset($author) ? $author : ''; ?>">
                    <?php if(isset($errors['author'])):?>
                        <p class="validation-error">
                            <?= $errors['author'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group <?= isset($errors['isbn'])? 'has-error' : ''; ?>">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" class="form-control" value="<?= isset($isbn) ? $isbn : ''; ?>">
                    <?php if(isset($errors['isbn'])):?>
                        <p class="validation-error">
                            <?= $errors['isbn'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group <?= isset($errors['releaseDate'])? 'has-error' : ''; ?>">
                    <label for="releaseDate">Release Date</label>
                    <input type="date" name="releaseDate" class="form-control" value="<?= isset($releaseDate) ? $releaseDate : ''; ?>"> <!--ask-->
                    <?php if(isset($errors['releaseDate'])):?>
                        <p class="validation-error">
                            <?= $errors['releaseDate'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>    
                <div class="form-group <?= isset($errors['price'])? 'has-error' : ''; ?>">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="<?= isset($price) ? $price : ''; ?>">
                    <?php if(isset($errors['price'])):?>
                        <p class="validation-error">
                            <?= $errors['price'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group <?= isset($errors['description'])? 'has-error' : ''; ?>">
                    <label for="desciption">Desciption</label>
                    <textarea name="description" class="form-control" style="resize: none; height:150px"><?= isset($description) ? $description : ''; ?></textarea>
                    <?php if(isset($errors['description'])):?>
                        <p class="validation-error">
                            <?= $errors['description'][0]; ?>
                        </p>
                    <?php endif; ?> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn green btn-form">SAVE</button>
                </div>
            </div>
        </form> 