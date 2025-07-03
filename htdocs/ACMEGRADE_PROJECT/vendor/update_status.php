<?php

include "../shared/connection.php";

$oid=$_POST['oid'];
$status=$_POST['status'];

mysqli_query($conn, "UPDATE `orders` SET status='$status' WHERE oid=$oid");

echo "<script>alert('Order status updated');
window.location.href='manageorder.php';
</script>";


?>