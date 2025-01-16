<?php

if ($_POST['button'] == "Submit") {

    $id = $_POST['ID'];
    $name = $_POST['NAME'];
    $address = $_POST['ADDRESS'];

}

$db = mysqli_connect('localhost', 'root', '', 'users');
$query = "INSERT INTO table_students VALUES('$id', '$name', '$address')";
$result = mysqli_query($db, $query);

if ($result) {

    echo "OK";
} else {
    echo "Not OK";
}

?>