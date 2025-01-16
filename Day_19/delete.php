<?php

$connection = mysqli_connect('localhost', 'root', '', 'users');

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$receive = $_REQUEST['id'];
$receive_file_name = $_REQUEST['profile_pic'];
$query = "DELETE FROM `user_info` WHERE id = $receive";
$result = mysqli_query($connection, $query);

if ($result) {

    unlink("../profile_pic/$receive_file_name");
    header("location: index.php?deleted");
}

?>