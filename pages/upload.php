<!--
    Name,Author,ISBN,ReleaseDate,Price,desciption
-->

<div class="page page-upload">
    <form method="post" class="card">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>   
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author">
        </div>
        <div class="form-group">
            <label for="ISBN">ISBN</label>
            <input type="text" name="ISBN">
        </div>
        <div class="form-group">
            <label for="releaseDate">Release Date</label>
            <input type="date" name="releaseDate"> <!--ask-->
        </div>    
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price">
        </div>
        <div class="form-group">
            <label for="desciption">Desciption</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <button type="submit">Upload</button>
        </div>
    </form> 
</div>