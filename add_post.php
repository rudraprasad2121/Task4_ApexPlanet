<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('bgg.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .form-container {
            background: rgba(255,255,255,0.9);
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h1 class="mb-3">Discover. Learn. Share. Grow.</h1>
        <p class="text-muted">Own Diary</p>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
            
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success">✅ New post added successfully!</div>';
            } else {
                echo '<div class="alert alert-danger">❌ Error: ' . $conn->error . '</div>';
            }
        }
        ?>

        <!-- Post Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">➕ Add Post</button>
            <a href="view_posts.php" class="btn btn-secondary"> View All Posts</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
