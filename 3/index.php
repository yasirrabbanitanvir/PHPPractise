<?php

$Mul = 1;
if (isset($_GET['n'])) {
    $x = $_GET['n'];
    for ($i = 0; $i < count($x); ++$i) {

        $Mul *= $x[$i]; 
    }
}

?>

<form action="" method="GET">

<input type="text" name='n[]'>
<input type="text" name='n[]'>
<input type="text" name='n[]'>
<input type="text" name='n[]'>
<input type="submit" name='btn' value='ADD' >

<p>The total is: </p> <?php echo $Mul;  ?> 

</form>