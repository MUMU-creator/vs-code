<?php

    $cartid=$_GET['cartid'];

    include "../shared/connection.php";

    $status=mysqli_query($conn,"DELETE FROM cart where cartid=$cartid");

    if($status){
        header("location:viewcart.php");
    }
    else{
        echo "Error in Deleteing";
    }
?>