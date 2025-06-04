<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .welcome {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin: 20px 0 10px;
        }

        .logout {
            text-align: center;
            margin: 15px 0 30px;
        }

        .logout a {
            font-size: 18px;
            text-decoration: none;
            color: #dc3545;
        }

        .logout a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .create-button {
            display: block;
            margin: 20px auto 25px;
            padding: 12px 25px;
            background: #28a745;
            color: white;
            border-radius: 6px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            width: fit-content;
            cursor: pointer;
        }

        .create-button:hover {
            background: #218838;
        }

        .post {
            margin-bottom: 40px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ccc;
        }

        .post-row {
            display: flex;
            margin-bottom: 10px;
            align-items: flex-start;
        }

        .post-label {
            width: 80px;
            font-weight: bold;
            color: #444;
            text-align: right;
            padding-right: 15px;
            font-size: 16px;
        }

        .post-data {
            flex: 1;
            color: #333;
            font-size: 16px;
            white-space: pre-wrap;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .actions a {
            display: inline-block;
            padding: 10px 22px;
            font-size: 15px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .actions a.edit {
            background-color: #007bff;
        }

        .actions a.edit:hover {
            background-color: #0056b3;
        }

        .actions a.delete {
            background-color: #dc3545;
        }

        .actions a.delete:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>

<div class="welcome">Welcome, <?= htmlspecialchars($_SESSION["user"]) ?></div>

<div class="container">
    <a class="create-button" href="create.php">+ Create New Post</a>
    
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="post">
            <div class="post-row">
                <div class="post-label">Title:</div>
                <div class="post-data"><?= htmlspecialchars($row['title']) ?></div>
            </div>
            <div class="post-row">
                <div class="post-label">Content:</div>
                <div class="post-data"><?= nl2br(htmlspecialchars($row['content'])) ?></div>
            </div>
            <div class="actions">
                <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<div class="logout">
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
