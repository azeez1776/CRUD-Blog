<?php include('config/db.php');
include('config/config.php');
#INSERT DATA
if (isset($_POST['add'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $iquery = "INSERT INTO Book(title,author,body) VALUES('$title','$author','$body')";

    if (mysqli_query($conn, $iquery)) {
        header('Location: ' . HOME_URL . '');
    } else {
        echo "Failed, the reason is " . mysqli_error($conn);
    }
}


?>

<?php include('inc/header.php'); ?>
<div class="container">
    <h1 style="text-align:center;">Add Post</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <input type="submit" name="add" value="submit" class="btn btn-primary">
</div>
</form>
</div>
<?php include('inc/footer.php') ?>