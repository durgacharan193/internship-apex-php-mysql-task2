<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include("db.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $content = $_POST["content"];

        $stmt = $conn->prepare("UPDATE blogs SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $content, $id);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $blog = $result->fetch_assoc();
}
?>

<form method="post">
    <input type="text" name="title" value="<?= htmlspecialchars($blog['title']) ?>" required><br>
    <textarea name="content" required><?= htmlspecialchars($blog['content']) ?></textarea><br>
    <input type="submit" value="Update">
</form>
