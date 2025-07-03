<?php

session_start();

print_r($_POST);
echo "<br>";
print_r($_FILES);

$img_name=$_FILES['pdtimg']['name'];
$old_path=$_FILES['pdtimg']['tmp_name'];

$new_path="../shared/images/$img_name";
echo"<br> $old_path";
echo"<br> $new_path";

move_uploaded_file($old_path,$new_path);

//$conn=new mysqli("localhost","root","","acme_oct2024");
include "../shared/connection.php";

try{
    mysqli_query($conn,"insert into product(name,price,detail,impath,category,stock,owner)
                                values('$_POST[name]',$_POST[price],'$_POST[detail]','$new_path','$_POST[category]',$_POST[stock],$_SESSION[userid])");
}
catch(Exception $ex){
    echo "<br>Error in Uploading";
    print_r($ex);
    exit;
}

echo "Product Uploaded Successfully!";


?>