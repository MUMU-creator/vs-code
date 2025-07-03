<?php
    include "menu.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form class="w-50 bg-warning p-3" action="addpdt.php" method="post" enctype="multipart/form-data">

        <h3 class="text-center">UPLOAD PRODUCT</h3>
        <input class="form-control mt-3" type="text" name="name" placeholder="Product Name">
        <input class="form-control mt-2" type="number" name="price" placeholder="Product Price">
        <textarea class="form-control mt-2" name="detail" placeholder="Product Description"></textarea>
        <input class="form-control mt-2" type="file" name="pdtimg" accept=".jpg,.png">
        <!-- Have category master table and query and populate here -->
        <select class="form-control mt-2" name="category">
            <option>Electronics</option>
            <option>Furniture</option>
            <option>Gadget</option>
            <option>Property</option>
            <option>Kids</option>
            <option>Gift</option>
            <option>Fashion</option>
        </select>
        <input class="form-control mt-2" type="number" name="stock" placeholder="Stock Qty">

        <div class="text-center">
        <button class="btn btn-success mt-3">Upload</button>
        </div>

    </form>
</div>

</body>
</html>