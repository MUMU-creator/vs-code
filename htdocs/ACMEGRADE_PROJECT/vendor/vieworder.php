<?php

?>

<html>
    <head>
        <title>View Orders</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <style>
            .order-card{
                width: 230px;
                height: fit-content;
                display: inline-block;
                vertical-align: top;
                margin: 10px;
                background-color: pink;
                color: black;
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
                font-size: 20px;
                font-weight: bold;
                color: maroon;
            }
            .price{
                font-size: 24px;
                color: green;
            }
            
            
        </style>
    </head>
    <body>

    <?php

    include "menu.html";
    
    include "../shared/connection.php";
    session_start();

    $owner=$_SESSION['userid'];

    $sql_result=mysqli_query($conn,"SELECT o.oid, o.userid, o.pid, o.price, o.quantity, o.status, p.name, p.impath, p.detail FROM orders o JOIN product p ON o.pid=p.pid WHERE p.owner='$owner'");

    if(mysqli_num_rows($sql_result)>0){

        while($dbrow=mysqli_fetch_assoc($sql_result))
        {
            echo "<div class='order-card'>";
            echo "<div class='name'><strong>Product: </strong>{$dbrow['name']}</div>";
            echo "<div class='price'>Price: Rs.{$dbrow['price']}</div>";
            echo "<img src='../images/{$dbrow['impath']}'>";
            echo "<div><strong>Order ID: </strong>{$dbrow['oid']}</div>";
            echo "<div><strong>Quantity: </strong>{$dbrow['quantity']}</div>";
            echo "<div><strong>Details: </strong>{$dbrow['detail']}</div>";
            echo "<div><strong>Status: </strong>{$dbrow['status']}</div>";
            
            echo "<div class='center'>";
            echo "<a href='cancelorder.php? oid={$dbrow['oid']}' onclick='return confirm(\"Cancel this order?\")'><br>";
            echo "<button class='btn btn-danger btn-sm'>CANCEL ORDER</button>";
            echo "</a>";
            echo "</div>";
            echo "</div>";
        
        }
    }
    else{
        echo "<p>NO ORDERS YET.</p>";
    }

    ?>


    </body>
</html>