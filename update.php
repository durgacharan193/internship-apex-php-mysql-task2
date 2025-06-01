<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}
include 'db.php';
$id=$_POST["id"];
$title=$_POST["title"];
$content=$_POST["content"];
$stmt=$conn->prepare("UPDATE posts SET title=?,content=? where id=?");
$stmt->bind_param("ssi",$title,$content,$id);
$stmt->execute();
header("Location: index.php");
?>