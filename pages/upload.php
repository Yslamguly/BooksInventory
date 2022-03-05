<!--
    Name,Author,ISBN,ReleaseDate,Price,desciption
-->

<form action="" method="post">
    <div class="">
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>   
    <div>
        <label for="author">Author</label>
        <input type="text" name="author">
    </div>
    <div>
        <label for="ISBN">ISBN</label>
        <input type="text" name="ISBN">
    </div>
    <div>
        <label for="releaseDate">Release Date</label>
        <input type="date" name="releaseDate"> <!--ask-->
    </div>    
    <div>
        <label for="price">Price</label>
        <input type="number" name="price">
    </div>
    <div>
        <label for="desciption">Desciption</label>
        <textarea name="description"></textarea>
    </div>
    <div>
        <button type="submit">Upload</button>
    </div>
</form>