<?php

$age=$_GET['age'];

if($age>=18){
    echo "<h1 style='color:green'>MAJOR</h1>";
}
else{
    echo "<h1 style='color:red'>MINOR</h1>";

}

?>