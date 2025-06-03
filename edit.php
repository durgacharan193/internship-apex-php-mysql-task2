<?php
include 'db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM posts WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title mb-4">Edit Blog Post</h4>
      <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
          <label>Title</label>
          <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Content</label>
          <textarea name="content" class="form-control" rows="6" required><?= htmlspecialchars($row['content']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
