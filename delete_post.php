
<?php


include 'db.php';

if (!isset($_GET['id'])) {
    die("Error: Post ID not provided.");
}

$id = intval($_GET['id']); // Ensure it's an integer

// Delete query
$sql = "DELETE FROM posts WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<p>Post deleted successfully!</p>";
    echo "<a href='view_posts.php'>Go back to posts</a>";
} else {
    echo "Error deleting post: " . $conn->error;
}
?>
