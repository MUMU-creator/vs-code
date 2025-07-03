<html>
    <head>
        <style>
            .order-card{
                width: 230px;
                height: fit-content;
                display: inline-block;
                vertical-align: top;
                margin: 10px;
                background-color: pink;
                color: maroon;
                padding: 20px;
            }
            img{
                width:100%;
                height: fit-content;
                border-radius: 5px;
            }
            .name{
                font-size: 24px;
                font-weight: bold;
                margin-top: 2px
            }
            .detail{
                font-size: 18px;
                color: maroon;
                margin: 5px;
            }
            .qty{
                font-size: 18px;
                color: green;
                margin: 5px;
            }
            .price{
                font-size: 28px;
                color: purple;
            }
            .total-box{
                margin: 20px auto;
                padding: 20px;
                background-color: yellow;
                width: fit-content;
                text-align: center;
                border-radius: 10px; 
                box-shadow: 15px;
            }
            .total-text{
                font-size: 24px;
                font-weight: bold;
                color: black;
            }
            .btn{
                padding: 20px;
                border-radius: 5px;
                margin: 10px;
                border: none;
                cursor: pointer;
                font-weight: bold;
            }
            .btn-success{
                background-color: green;
                color: white;
            }
            .btn-primary{
                background-color: blue;
                color: white;
            }
            .text-center{
                text-align: center;
            }
        </style>
    </head>
<body>
    <?php
    include "menu.html";

    include "../shared/connection.php";
    session_start();
    
    $sql_result= mysqli_query($conn,"SELECT * FROM cart JOIN product ON cart.pid=product.pid WHERE userid=$_SESSION[userid]");
    $total = 0;

    ?>

    <h3 class="text-center mt-4">Review & Place Order</h3>
    <div style="text-align: center;">
        <form action="submitorder.php" method="POST">
            <?php
            $total= 0;
            if(mysqli_num_rows($sql_result) > 0){
                while($dbrow= mysqli_fetch_assoc($sql_result)){
                    
                    echo "<div class='order-card'>
                        <div class='name'>{$dbrow['name']}</div>
                        <div class='price'>Price: Rs.{$dbrow['price']}</div>
                        <img src='../images/{$dbrow['impath']}'>
                        <div class='detail'>Detail: {$dbrow['detail']}</div>
                        <div class='qty'><lable>Qty:<input type='number' class='qty-input' name='qty[]' value='1' min='1' required style='width: 40px; height: 20px; text-align: center; margin-left:5px;' ></div>
                        
                    </div>"; 
                    echo "<input type='hidden' name='pid[]' value='{$dbrow['pid']}'>";
                    echo "<input type='hidden' name='qty[]' value='{$dbrow['quantity']}'>";
                    
                    $total+= $dbrow['price'] * $dbrow['quantity'];
                    $total+= $dbrow['price'];
                    
                }
            }
            else{
                echo "<p>Your Cart is Empty!</p>";
            }
            ?>
            
            
            <div class="total-box">
                <h3 class= "total-text">TOTAL AMOUNT: RS. <?php echo $total; ?></h3>
                <input type="hidden" name="total" value=<?php echo $total; ?>>
                <div class="text-center">
                    <button type="submit" name="payment_mode" value="COD" class='btn btn-success'>PLACE ORDER (COD)</button>
                    <button type="submit" name="payment_mode" value='online' class='btn btn-primary'>PAY ONLINE (COD)></button>
                </div>
            </div>    
        
        </form>
    </div>

    
</body>
</html>

