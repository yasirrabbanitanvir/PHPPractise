<?php
$nam = $_REQUEST['username'];
$em = $_REQUEST['email'];
$pass = $_REQUEST['password'];

$countPass = strlen($pass);

if (!($countPass >= 5 && $countPass <= 10)) {
    header("Location: index.php?wrongPass=Your password must be between 5 and 10 characters long.");
} else {
    echo "Perfect";
}
?>