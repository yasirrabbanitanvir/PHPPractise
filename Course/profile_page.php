<pre>
<?php
$pro = $_FILES['profile'];

// var_dump($pro);

// $abc = array(2,34,454,45,454);

// $arrayName = array('nirob' => "25", 'Turza' => "22");

// echo $arrayName['nirob'];
// echo $abc[0];

// echo $name = $pro['name'];
// echo "<br>";
// echo $type = $pro['type'];
// echo "<br>";
// echo $tmp_name = $pro['tmp_name'];
// echo "<br>";

// $size = $pro['size'];

// echo floor($size/1000) . "KB";

$name = $pro['name'];
$type = $pro['type'];
$tmp_name = $pro['tmp_name'];

if(!empty($name)){

    $loc = "upload/"; 

    // move_uploaded_file($tmp_name, $loc. "test.jpg");

   if(move_uploaded_file($tmp_name, $loc. $name)) {
        echo "file uploaded";
        $path = $loc. $name;
        echo "<img src='$path'; width='200' height='200'>";
   }

    else{
        echo "file not uploaded";
    }
}

else{

    echo "File not found";
}

?>
</pre>