<?php

include "../shared/connection.php";

$pid=$_GET['pid'];

$status=mysqli_query($conn,"DELETE FROM product WHERE pid=$pid");

if($status){
    header("location:viewpdt.php");
}
else{
    echo "Error deleting product";
}


?>