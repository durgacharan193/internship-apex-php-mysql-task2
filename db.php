<?php
include 'config.php';
$conn= new mysqli($host,$user,$pass,$db,3307);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>