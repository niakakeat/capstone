<?php

$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "tattoo_gym";
$conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName);
if (!$conn) {  
    die("Something went wrong;");
}
?>