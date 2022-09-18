<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "pj65";

$connect = new mysqli($servername, $username, $password,$db);

if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully";
?>
