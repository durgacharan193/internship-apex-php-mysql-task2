<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}
include 'db.php';
$id=$_GET["id"];
$conn->query("DELETE FROM posts WHERE id=$id");
header("Location: index.php");
?>