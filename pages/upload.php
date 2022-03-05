<!--
    Name,Author,ISBN,ReleaseDate,Price,desciption
-->

<div class="page page-upload">
    <form class="card" action="/test/?p=upload" method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>   
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
            <label for="ISBN">ISBN</label>
            <input type="text" name="ISBN" class="form-control">
        </div>
        <div class="form-group">
            <label for="releaseDate">Release Date</label>
            <input type="date" name="releaseDate" class="form-control"> <!--ask-->
        </div>    
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="desciption">Desciption</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div>
            <button type="submit" class="btn">Upload</button>
        </div>
    </form> 
</div>