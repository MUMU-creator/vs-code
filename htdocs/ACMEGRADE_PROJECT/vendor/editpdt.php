<?php

include "../shared/connection.php";

$pid = $_GET['pid'];

$sql_result = mysqli_query($conn, "SELECT * FROM product WHERE pid=$pid");

$dbrow = mysqli_fetch_assoc($sql_result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background-color:white;
            
        }
        .container{
            max-width: 600px;
            font-size:18px;
            font-weight:500px;
            margin-top: 80px;
            background-color:pink;
            padding: 30px;
            border-radius: 10px;
        }
        .form-title{
            text-align: center;
            font-size: 30px;
            font-weight: 200px;
            color: maroon;
            margin-bottom: 10px;
        }
        .btn-primary{
            background-color:maroon;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

    </style>

</head>
<body>

<div class="container">
    <h4 class="form-title">EDIT PRODUCT</h4>
    <form action="updatepdt.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pid" value="<?php echo $dbrow['pid']; ?>">

        <div class="form-group">
            <label>Product Name:</label>
            <input type="text" name="name" value="<?php echo $dbrow['name']; ?>"
            class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price (Rs):</label>
            <input type="number" name="price" value="<?php echo $dbrow['price']; ?>"
            class="form-control" required>
        </div>

        <div class="form-group">
            <label>Category:</label>
            <input type="text" name="category" value="<?php echo $dbrow['category']; ?>"
            class="form-control" required>
        </div>

        <div class="form-group">
            <label>Stock:</label>
            <input type="number" name="stock" value="<?php echo $dbrow['stock']; ?>"
            class="form-control" required> 
        </div>

        <div class="form-group">
            <label>Details:</label>
            <textarea name="detail" class="form-control" row="3" required><?php echo $dbrow['detail']?></textarea>   
        </div>

        <div class="form-group">
            <label>Change Image:</label>
            <input type="file" name="impath" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Update Product</button>

    </form>

</div>
    
</body>
</html>
