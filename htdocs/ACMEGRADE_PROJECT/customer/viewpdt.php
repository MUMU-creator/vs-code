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
        </style>
    </head>
</html>



<?php

include "menu.html";

include "../shared/connection.php";
session_start();
$sql_result=mysqli_query($conn,"SELECT * FROM product");

//loop will execture until $dbrow is empty i.e. all rows are fetched from sql_result
while($dbrow=mysqli_fetch_assoc($sql_result)){

    //print_r($dbrow);
    echo "<div class='pdt-card'>
        <div class='name'>$dbrow[name]</div>
        <div class='price'>$dbrow[price]</div>
        <img src='$dbrow[impath]'>
        <div>$dbrow[detail]</div>
        <div class='center'>
            <a href='addcart.php?pid=$dbrow[pid]'>
                <button class='btn btn-primary'>Add Cart</button>
            </a>
        </div>
    </div>";
}



?>