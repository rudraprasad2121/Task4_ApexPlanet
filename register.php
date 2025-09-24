<?php
include 'db.php';
session_start();

$message = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password securely
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement (to prevent SQL injection)
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>✅ Registration successful! <a href='login.php'>Login here</a></div>";
    } else {
        $message = "<div class='alert alert-danger'>❌ Error: " . $stmt->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center mb-3">📝 Register</h3>

                    <!-- Success / Error Messages -->
                    <?php if (!empty($message)) echo $message; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" name="register" class="btn btn-success w-100">Register</button>
                    </form>

                    <p class="text-center mt-3">Already have an account? 
                        <a href="login.php">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
