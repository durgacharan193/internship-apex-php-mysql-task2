<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}
include 'db.php';
$id=$_GET["id"];
$post=$conn->Query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>
<h2>Edit Post</h2>
<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?=$post['id'] ?>">
    Title: <input type="text" name="title" value="<?=htmlspecialchars($post['title']) ?>" required><br>
    Content: <textarea name="content" required><?=htmlspecialchars($post['content']) ?></textarea><br>
    <button type="submit">Update</button>
</form>