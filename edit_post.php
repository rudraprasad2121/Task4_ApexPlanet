<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die("Error: Post ID not provided.");
}

$id = intval($_GET['id']); // Ensure it's an integer

// Fetch post data
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Error: Post not found.");
}

$post = $result->fetch_assoc();

// Update logic
if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql_update = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<div class='container mt-4 alert alert-success'>Post updated successfully! 
              <a href='view_posts.php' class='btn btn-sm btn-primary ms-3'>Go back to posts</a></div>";
        exit;
    } else {
        echo "<div class='container mt-4 alert alert-danger'>Error updating post: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Edit Post</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" 
                               value="<?php echo htmlspecialchars($post['title']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content" rows="5" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                    </div>

                    <button type="submit" name="update" class="btn btn-success">Update Post</button>
                    <a href="view_posts.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
