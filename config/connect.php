<?php
$host = "localhost";
$name = "root";
$password = "";
$dbName = "jcommunity";

$conn = new mysqli($host, $name,$password,$dbName);

if($conn -> connect_error){
    die("connection failed: ". $conn->connect_error);
}
?>