<?php include('config/db.php');
include('config/config.php');

#EDIT DATA
if (isset($_POST['update'])) {
    $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);

    $iquery = "UPDATE Book SET
    title='$title',
    author='$author',
    body='$body'
    WHERE id = {$update_id}";

    if (mysqli_query($conn, $iquery)) {
        header('Location: ' . HOME_URL . '');
    } else {
        echo "Failed, the reason is " . mysqli_error($conn);
    }
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM Book WHERE id = $id");

$recs = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);



?>

<?php include('inc/header.php'); ?>
<div class="container">
    <h1 style="text-align:center;">Add Post</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $recs['title'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" name="author" value="<?php echo $recs['author'] ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"><?php echo $recs['body'] ?></textarea>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $recs['id'] ?>">
        <input type="submit" name="update" value="Update" class="btn btn-primary" style="margin:10px;">
</div>
</form>
</div>
<?php include('inc/footer.php') ?>