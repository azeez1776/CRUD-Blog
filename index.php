<?php
require('config/db.php');

#Fetching data
$result = mysqli_query($conn, "SELECT * FROM Book");

$recs = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>
<?php include('inc/header.php'); ?>

<body>
    <?php include('nav.php') ?>
    <h1 style="text-align:center;">POSTS</h1>
    <?php foreach ($recs as $rec) : ?>
        <div class="container">
            <div class="card" style="margin:2rem;">
                <div class="card-body">
                    <h1><?php echo $rec['title'] ?></h1>
                    <small>created at <?php echo $rec['created_at'] ?> by <?php echo $rec['author'] ?></small>
                    <p><?php echo $rec['body'] ?></p>
                    <a href="page.php?id=<?php echo $rec['id'] ?>" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php include('inc/footer.php') ?>