<?php

$nam = $_REQUEST['username'];
$em = $_REQUEST['email'];
$pass = $_REQUEST['password'];

$hash_format = "$2y$10$";
$salt = "usesomesillystringforsalt";
$conC = $hash_format . $salt;

echo $pass;
echo "<br>";
echo crypt($pass, $conC);

?>