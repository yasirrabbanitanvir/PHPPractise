<?php

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rec_file = $_FILES['upload_image'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    // Adding code to handle file
    $image_name = $rec_file['name'];
    $image_type = $rec_file['type'];
    $image_tmp_name = $rec_file['tmp_name'];

    $name_changer = uniqid() . ".png";

    if (!empty($image_name)) {
        $loc = "../profile_pic/";
        move_uploaded_file($image_tmp_name, $loc . $name_changer);
    } else {
        echo "Your file is emty.";
    }

    if ($username && $email && $password) {
        $connection = mysqli_connect('localhost', 'root', '', 'users');

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "INSERT INTO user_info (profile_pic, username, email, password, gender, country) VALUES ('$name_changer', '$username', '$email', '$password', '$gender', '$country')";

        $result = mysqli_query($connection, $query);

        if ($result) {
            header("location: index.php?inserted");
        } else {
            echo "Insert failed: " . mysqli_error($connection);
        }

    } else {
        echo "No field can be blank";
    }
}

?>