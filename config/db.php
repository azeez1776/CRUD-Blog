<?php
# making connection with the database
$conn = mysqli_connect('localhost', 'root', <password>, 'Library');

if (mysqli_connect_errno()) {
    echo 'Something is wrong, check this message ' . mysqli_connect_errno();
}
