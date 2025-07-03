<?php

include "../shared/connection.php";

$oid=$_GET['oid'];
$status=mysqli_query($conn,"DELETE FROM orders WHERE oid=$oid");

if($status){
    header("location:vieworder.php");
}
else{
    echo "Error in canceling order.";
}

?>