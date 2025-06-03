<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
include("db.php");
$result = mysqli_query($conn, "SELECT * FROM blog ORDER BY created_at DESC");
?>

<h2>Welcome <?= htmlspecialchars($_SESSION["username"]) ?> | <a href="logout.php">Logout</a> | <a href="create.php">New Post</a></h2>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
<div>
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
    <small><?= $row['created_at'] ?></small><br>
    <a href="update.php?id=<?= $row['id'] ?>">Edit</a>
    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this post?')">Delete</a>
</div>
<hr>
<?php endwhile; ?>
