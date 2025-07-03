<?php
//Authguard
session_start();
//Skipped Login
    //No Session, No Login_status
    if(!isset($_SESSION['login_status'])){
        echo "<h2>You Skipped The Login</h2>";
        exit;
    }
//Failed Login
    //Session, Login_status
    if($_SESSION['login_status']==false){
        echo "<h2>Unauthorized Login</h2>";
        exit;
    }
    if($_SESSION['usertype']!="Customer"){
        echo "Forbidden Access";
        exit;
    }
    include "menu.html";
?> 
   
<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
    
    <h1>Customer Welcomes You</h1>
    
</body>
</html>

