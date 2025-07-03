<?php
include "../shared/connection.php";
session_start();

if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];
    $owner = $_SESSION['userid'];
    $imgQuery="";

    if($_FILES['impath']['name']!=""){
        $filename=$_FILES['impath']['name'];
        $tmp=$_FILES['impath']['tmp_name'];
        $targetPath="../images".uniqid().$filename;
        move_uploaded_file($tmp,$targetPath);
        $imgQuery=",impath='$targetPath'";
    }
    
    
    $update="UPDATE product SET name='$name', price='$price', detail='$detail', stock='$stock', category='$category' $imgQuery WHERE pid='$pid' AND owner='$owner'";


    $sql_result = mysqli_query($conn, $update);

    if($sql_result){
        if(mysqli_affected_rows($conn)> 0){
            echo "<script>alert('Product updated succesfully');
            window.location='viewpdt.php';
            </script>";
        }
        else{
            echo "<script>alert('no changes made or product not found for this vendor');
            window.location='viewpdt.php';
            </script>";
        }

    } 
    else{
        echo "<h3>Update failed:". mysqli_error($conn) . "</h3>";
        echo "<pre>Query: $update</pre>";
    }

}
else{
    echo "Invalid Access.";    
    }
?>

