<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bookbooking";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

echo "connect";