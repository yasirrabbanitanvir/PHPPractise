<?php

$all_keys = array ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '[', ']', '{', '}', '<', '>', '?');

$length = array(8,9,10,11,12,13,14,15);

shuffle($length);
$final_length = $length[0];
echo "<br> Password length is $final_length <br>";
$str = '';

for ($i = 0; $i < $final_length; $i++) {
shuffle($all_keys);
$str .= $all_keys[0];}

echo "<br> Your random password is $str";

?>