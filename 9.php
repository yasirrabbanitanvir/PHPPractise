<?php
$a = 0;
$b = 0;
for ($i = 0; $i < 5; $i++) {
    $a += 10;
    $b += 5;
}
echo ("At the end of the loop a = $a and b = $b");

$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
foreach ($age as $x => $val) {
    echo "<br />$val<br>";
}
?>