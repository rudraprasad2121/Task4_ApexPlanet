<?php
$host = "localhost";
$user = "root";  // default in XAMPP/WAMP
$pass = "";      // default is empty
$dbname = "blog";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>