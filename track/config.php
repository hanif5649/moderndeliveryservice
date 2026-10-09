<?php
$host = "localhost";
$user = "modernde_delivery";
$pass = "modernde_delivery";
$dbname = "modernde_delivery";

$conn = new mysqli($host, $user, $pass, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 
?> 