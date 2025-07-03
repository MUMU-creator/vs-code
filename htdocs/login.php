<?php

$uname=$_POST["username"];
$upass=$_POST["password"];

if($uname=="Smruti" && $upass=="acme"){
    echo "Login Success";
}
else{
    echo "Invalid Credentials";
}


?>