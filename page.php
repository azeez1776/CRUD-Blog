<?php
require('config/config.php');
require('config/db.php');

#Delete
if (isset($_POST['delete'])) {

    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    $iquery = "DELETE FROM Book WHERE id={$delete_id}";

    if (mysqli_query($conn, $iquery)) {
        header('Location: ' . HOME_URL . '');
    } else {
        echo "Failed, the reason is " . mysqli_error($conn);
    }
}



$id = mysqli_real_escape_string($conn, $_GET['id']);

$result = mysqli_query($conn, "SELECT * FROM Book WHERE id = $id ");

$recs = mysqli_fetch_assoc($result);

mysqli_free_result($result);
mysqli_close($conn);

?>



<?php include('inc/header.php') ?>

<body>
    <h1 style="text-align:center;">POST</h1>

    <div class="container">
        <a href="index.php" class="btn btn-primary" style="margin:10px;">Back</a>
        <div class="card">
            <div class="card-body">
                <h1><?php echo $recs['title'] ?></h1>
                <small>created at <?php echo $recs['created_at'] ?> by <?php echo $recs['author'] ?></small>
                <p><?php echo $recs['body'] ?></p>
                <hr>
                <form class="float-end" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $recs['id'] ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
                <a href="<?php echo HOME_URL; ?>edit.php?id=<?php echo $recs['id']; ?>" class=" btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
    <?php include('inc/footer.php'); ?>