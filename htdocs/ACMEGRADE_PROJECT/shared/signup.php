<?php

print_r($_POST);

//$conn=new mysqli("localhost","root","","acme_oct2024",3306);
include "connection.php";

//TASK: HASH the password before inserting

$hashed_password=password_hash($_POST['password'], PASSWORD_DEFAULT);
echo "<br><b>Hashed Password:</b>". $hashed_password;

echo "<br>";

$query="INSERT INTO user(username,password,mobile,usertype) VALUES('$_POST[username]','$hashed_password','$_POST[mobile]','$_POST[usertype]')";

echo $query;

try
{
    $status=mysqli_query($conn,$query);
    echo "<br> <h2>Signup Successful</h2>";
}
catch(Exception $ex){

    echo "ERROR in User creation";
    echo $ex;
}


?>