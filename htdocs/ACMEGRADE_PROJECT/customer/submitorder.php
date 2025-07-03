<?php

session_start();
include "../shared/connection.php";

if(!isset($_POST['payment_mode']) || empty($_POST['pid'])){
    echo "Invalid order.";
    exit;
}

$userid = $_SESSION['userid'];
$payment_mode = $_POST['payment_mode'];
$totalAmount= 0;
$pids = $_POST['pid'];
$qts =$_POST['qty'];

foreach ($pids as $index => $pid) {
    $qty= $qts[$index];
    // Fetch product snapshot
    $sql_result = mysqli_query($conn, "SELECT * FROM product WHERE pid = $pid");
    $dbrow = mysqli_fetch_assoc($sql_result);

    $pname = $dbrow['name'];
    $price = $dbrow['price'];
    $impath = $dbrow['impath'];
    $detail = $dbrow['detail'];

    $line_total= $price * $qty;
    $totalAmount += $line_total;

    $insert = "INSERT INTO `orders`(pid, userid, status, payment_mode, pname, price, impath, detail, quantity)
               VALUES('$pid', '$userid', 'Order Placed', '$payment_mode', '$pname', '$price', '$impath', '$detail', '$qty')";
    
    mysqli_query($conn, $insert);
}

// Clear cart
mysqli_query($conn, "DELETE FROM cart WHERE userid='$userid'");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        body{
            text-align: center;
            margin-top: 50px;
            padding: 50px;
            background-color: lavender;
        }
        .confirmation{
            font-size: 20px;
            color: green;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .details{
            margin-top: 30px;
            font-size: 20px;
        }
        .btn{
            margin-top: 30px;
            padding: 5px;
            background-color: royalblue;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
        }

    </style>
</head>
<body>
    <div class="confirmation">Your Order Has Been Successfully Placed!</div>
    <div class="details"><p>Total Amount: <strong>Rs. <?php echo $totalAmount; ?></strong></p>
    <p>Payment Mode: <strong><?php echo $payment_mode; ?></strong></p>
    </div>
    <a href="viewcart.php"><button class="btn">Back to Cart</button></a>

</body>
</html>



