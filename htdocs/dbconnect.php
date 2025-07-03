<?php

echo "Attempting to connect to DBServer";

$conn=new mysqli("localhost","root","","acme2024_nov");

echo "<br>";

print_r($conn);

?>