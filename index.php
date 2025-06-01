<?php
session_start();
if(!isset($_SESSION["user_id"]))
{
    header("Location:login.php");exit();
}
include 'db.php';
?>
<h2>All Posts</h2>
<a href="create.php">+ New Post</a>| <a href="logout.php">Logout</a><br><br>
<?php
$result=$conn->query("SELECT * FROM posts ORDER BY created_at DESC");
while($row=$result->fetch_assoc())
{
    echo "<h3>". htmlspecialchars($row['title'])."</h3>";
    echo "<p>". nl2br(htmlspecialchars($row['content']))."</p>";
    echo "<a href='edit.php?id={$row['id']}'>Edit</a> | ";
    echo "<a href='delete.php?id={$row['id']}'>Delete</a><hr>"; 
}
?>