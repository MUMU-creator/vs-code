<?php

session_start();
$_SESSION["login_status"]=false;
print_r($_POST);

///$conn = new mysqli("localhost","root","","acme_oct2024",3306);
include "connection.php";

//TASK: HASH the password before comparing

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT* FROM user WHERE username='$_POST[username]'";
$sql_result=mysqli_query($conn,$query);

echo "<br>Query: $query<br>";
print_r($sql_result);

if(mysqli_num_rows($sql_result) == 0){
    echo "<h2>Invalid Credentials (User Not Found)</h2>";
    exit;
}

$dbrow=mysqli_fetch_assoc($sql_result);
echo "<br>";
print_r($dbrow);

$db_hashed_password=$dbrow['password'];
echo "<br><b>Hashed Password from DB:</b> $db_hashed_password";


if(!password_verify($_POST['password'], $db_hashed_password)){
    echo "<h2>Invalid Credentials(Wrong Password)</h2>";
    exit;
}

echo "<h1>Login Success</h1>";
$_SESSION["login_status"]=true;
$_SESSION["usertype"]=$dbrow['usertype'];
$_SESSION["username"]=$dbrow['username'];
$_SESSION["userid"]=$dbrow['userid'];

if($dbrow['usertype']=='Vendor')
{
    header("location:../vendor/home.php");
}
elseif($dbrow["usertype"]=="Customer")
{
    header("location:../customer/home.php");
}



?>