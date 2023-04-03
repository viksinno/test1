<?php
$servername = "localhost";
$username = "vikas";
$password = "Vikas123@";
$dbname = "Todo_list";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
