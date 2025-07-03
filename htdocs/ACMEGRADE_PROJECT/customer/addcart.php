<?php

session_start();

include "../shared/connection.php";

$status=mysqli_query($conn,"INSERT INTO cart(userid,pid) VALUES($_SESSION[userid],$_GET[pid])");
if($status){
    header("location:viewcart.php");
}
else{
    echo "Error in adding pdt to cart";
}

?>