<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}
include 'db.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=$_POST["title"];
    $content=$_POST["content"];
    $stmt=$conn->prepare("INSERT INTO posts(title,content) VALUES(?,?)");
    $stmt->bind_param("ss",$title,$content);
   if($stmt->execute()){
        header("Location:index.php");
}else
{
    echo "Error: ".$stmt->error;
}
}
?>
<h2>Create Post</h2>
<form method="post" action="">
    Title: <input type="text" name="title" required><br>
    Content: <textarea name="content" required></textarea><br>
    <button type="submit">Save</button>
</form>