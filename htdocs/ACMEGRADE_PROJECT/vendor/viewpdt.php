<html>
    <head>
        <style>
            .pdt-card{
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
                border-radius: 5px;
            }
            .center{
                text-align: center;
            }
            .name{
                font-size: 24px;
                font-weight: bold;
            }
            .price{
                font-size: 24px;
                color: purple;
            }
            .price::after{
                content:"Rs";
                font-size: 12px;
            }
            .card-title{
                font-weight: 600px;
                font-size: 20px;
            }
            .card-text{
                font-size: 28px;
                font-weight: bold;
            }
        </style>
    </head>
</html>

<?php
include "menu.html";?>

<?php
include "../shared/connection.php";
session_start();
$owner= $_SESSION['userid'];
$sql_result=mysqli_query($conn,"SELECT * FROM product WHERE owner=$owner");
$total=0;

//loop will execture until $dbrow is empty i.e. all rows are fetched from sql_result
while($dbrow=mysqli_fetch_assoc($sql_result)){

    //print_r($dbrow);
    $total+= $dbrow['price'];
    echo "<div class='pdt-card'>
        <div class='name'>$dbrow[name]</div>
        <div class='price'>$dbrow[price]</div>
        <img src='$dbrow[impath]'>
        <div>$dbrow[detail]</div>
        <div class='center'>
            <a href='editpdt.php?pid={$dbrow['pid']}'>
            <button class='btn btn-warning btn-sm'>Edit</button>
            </a>
            <a href='deletepdt.php?pid={$dbrow['pid']}'onclick='return confirm(\"Delete this Product?\")'>
            <button class='btn btn-danger btn-sm'>Delete</button>
            </a>  
        </div>
    </div>";
}
?>

<div class="container mt-4">
    <div class="card text-white bg-success text-center shadow-sm" style="max-width: 400px; margin: auto;">
        <div class="card-body">
            <h5 class="card-title">TOTAL VALUE OF PRODUCTS</h5>
            <h3 class="card-text">Rs. <?php echo $total; ?></h3>
        </div>
    </div>
</div>
