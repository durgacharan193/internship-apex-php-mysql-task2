<?php
session_start();
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);
    $stmt->execute();
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Post</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: lightblue;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 350px;
            box-sizing: border-box;
            text-align: center;
        }
        h2 {
            margin-bottom: 25px;
            color: #333;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
            resize: vertical;
        }
        textarea {
            min-height: 120px;
        }
        input[type="submit"] {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 14px 25px;
            font-size: 18px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        label {
            font-weight: 600;
            color: #555;
            display: block;
            text-align: left;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Create New Post</h2>
    <form method="POST">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" required autofocus>

        <label for="content">Content</label>
        <textarea id="content" name="content" required></textarea>

        <input type="submit" value="Create">
    </form>
</div>

</body>
</html>
