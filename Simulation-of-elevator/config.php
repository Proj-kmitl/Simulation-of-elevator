<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "pj65";

$connect = new mysqli($servername, $username, $password,$db);

if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}
//echo "Connected successfully";


/*
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $connect = new PDO("mysql:host=$servername;dbname=pj65", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
*/
?>
