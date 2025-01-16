<?php

$id = $_POST['ID'];
$nam = $_POST['name'];
$bld = $_POST['blood_group'];
$ar = $_POST['area'];
$add = $_POST['address'];
$gr = $_POST['gender'];
$ag = $_POST['age'];


$db = mysqli_connect("localhost", "root", "", "db_blood");

$query = "SELECT * FROM tbl_blood WHERE name = '$nam' AND address = '$add' AND blood_group = '$bld'";

$result = mysqli_query($db, $query);

$rec = mysqli_fetch_object($result);

echo "Name: " . $rec->name;
echo "Blood_Group: " . $rec->blood_group;
echo "Address: " . $rec->address;

?>