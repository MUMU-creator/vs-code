<html>
    <head>
        <style>
            .cart-card{
                width: 230px;
                height: fit-content;
                display: inline-block;
                vertical-align: top;
                margin: 10px;
                background-color: lavender;
                color: maroon;
                padding: 20px;
            }
            img{
                width:100%;
            }
            .center{
                text-align: center;
            }
            .name{
                font-size: 24px;
                font-weight: bold;
            }
            .price{
                font-size: 28px;
                color: purple;
            }
            .price::before{
                content:"Rs. ";
                font-size: 28px;
            }
            .card-title{
                font-weight: 600px;
                font-size: 35px;
            }
            .card-text{
                font-size: 28px;
                font-weight: bold;
                
            }
        </style>
    </head>
</html>

<?php

include "menu.html";

include "../shared/connection.php";
session_start();

$sql_result=mysqli_query($conn,"SELECT * FROM cart join product on cart.pid=product.pid where userid=$_SESSION[userid] ");
$total=0;
while($dbrow=mysqli_fetch_assoc($sql_result)){

    $total+=$dbrow['price'];
    echo "<div class='cart-card'>
        <div class='name'>$dbrow[name]</div>
        <div class='price'>$dbrow[price]</div>
        <img src='$dbrow[impath]'>
        <div>$dbrow[detail]</div>
        <div class='center'>
            <a href='deletecart.php?cartid=$dbrow[cartid]'>
                <button class='btn btn-danger'>Remove Cart</button>
            </a>
        </div>
    </div>";
}

?>

<div class="container mt-4">
    <div class="card text-dark bg-warning text-center shadow-sm" style="max-width: 300px; margin: auto;">
        <div class="card-body">
            <h5 class="card-title">TOTAL PRICE:</h5>
            <h3 class="card-text">Rs. <?php echo $total; ?></h3>
        <button class='btn btn-success'>Place Order</button>
        </div>
    </div>
</div>
