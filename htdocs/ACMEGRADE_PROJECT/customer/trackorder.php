<?php

include "../shared/connection.php";
session_start();

$userid = $_SESSION['userid'];

$sql = "SELECT o.oid, o.quantity AS o_quantity, o.payment_mode, o.status, o.order_date, p.name, p.price, p.impath FROM `orders` o JOIN product p ON o.pid = p.pid WHERE o.userid = $userid ORDER BY o.order_date DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Track Orders</title>
    <style>
        body{
            padding: 5px;
            background-color: lavender;
        }
        .order-card{
            background-color: white;
            margin-bottom: 20px;
            border: solid;
            border-radius: 10px;
            box-shadow: 2px;
        }
        .order-title{
            font-weight: bold;
            font-size: 18px;
            color: maroon;
        }
        .order-info{
            margin-top: 10px;
        }
        .delivered-date{
            color: green;
            font-weight: bold;
        }

    </style>
</head>
<body>
<h2>Your Orders</h2>

<?php 
$grand_total= 0;
if(mysqli_num_rows($result) > 0){
    while ($dbrow = mysqli_fetch_assoc($result)){
    
        
        $name= $dbrow['name'];
        $price= $dbrow['price']; 
        $qty= $dbrow['o_quantity'];
        $payment= $dbrow['payment_mode'];
        $image= $dbrow['impath']; 
        $status= $dbrow['status']; 
        $order_date= $dbrow['order_date']; 
        $delivery_date= date("d M Y", strtotime($order_date."+3 days"));
        $total= $price*$qty;
        $grand_total += $total;
?>
    <div class= "order-card">
        <div class="order-title"><strong><?= $name ?> </strong><br></div>
        <img src="<?= $image ?>" width="100"><br>
        <div class="order-info">
        Price: <?= $price ?><br>
        Quantity: <?= $qty ?><br>
        Total amount: <strong>Rs. <?php echo $total ?></strong><br>
        Payment Mode: <?= $dbrow['payment_mode'] ?><br>
        Status: <b><?= $status ?></b><br>
        Order Date: <?= $order_date ?><br>
        <span class="delivered-date">Delivered by: <?php echo $delivery_date; ?></span>
        </div>
    </div>
    
<?php 
    }
    echo "<h3 style='color: green'>Grand Total Amount for All Orders: Rs. {$grand_total}</h3>";
}   else{
        echo "No orders found.";
}
    ?>

</body>
</html>