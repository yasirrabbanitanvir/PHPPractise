<?php

$name = "user";
$value = "Nirob";

setcookie($name, $value, time()+20);

if(isset($_COOKIE['user'])){
    echo "Saved Cookie {$_COOKIE['user']}";
}

else{
    echo"Cookie is not set";
}

?>