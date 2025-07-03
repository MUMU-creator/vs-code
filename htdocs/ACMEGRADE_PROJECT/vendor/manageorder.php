<?php

include "../shared/connection.php";
session_start();

$owner = $_SESSION['userid']; // assuming vendor login stores owner ID

$sql = "SELECT o.oid, o.quantity, o.status, o.order_date, u.username, p.name, p.price, p.impath FROM orders o JOIN product p ON o.pid = p.pid JOIN user u ON o.userid = u.userid WHERE p.owner = $owner ORDER BY o.oid DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Orders</title>
</head>
<body>
<h2>Vendor Orders</h2>

<?php while ($dbrow = mysqli_fetch_assoc($result)): ?>
    <div style="border:1px solid black; margin:15px; padding:10px;">
        <img src="<?= $dbrow['impath'] ?>" width="100"><br>
        Product: <b><?= $dbrow['name'] ?></b><br>
        Quantity: <?= $dbrow['quantity'] ?><br>
        Buyer: <?= $dbrow['username'] ?><br>
        Status: <b><?= $dbrow['status'] ?></b><br>

        <form action="update_status.php" method="post">
            <input type="hidden" name="oid" value="<?= $dbrow['oid'] ?>">
            <select name="status">
                <option <?= $dbrow['status']=='Pending'?'selected':'' ?>>Pending</option>
                <option <?= $dbrow['status']=='Processing'?'selected':'' ?>>Processing</option>
                <option <?= $dbrow['status']=='Shipped'?'selected':'' ?>>Shipped</option>
                <option <?= $dbrow['status']=='Delivered'?'selected':'' ?>>Delivered</option>
                <option <?= $dbrow['status']=='Cancelled'?'selected':'' ?>>Cancelled</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
<?php endwhile; ?>

</body>
</html>