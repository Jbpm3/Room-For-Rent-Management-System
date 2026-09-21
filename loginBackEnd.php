<?php
session_start();

// Connect to database
$conn = new mysqli("localhost", "s24100596_magsipoc_residences", "24100596", "s24100596_magsipoc_residences");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$username = $_POST["username"];
$password = $_POST["password"];

// Sanitize inputs
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Query for user
$result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Set session variables
    $_SESSION['role'] = $user['role'];
    $_SESSION['username'] = $user['username'];

    // Redirect based on role
    if ($user['role'] === 'admin') {
        header("Location: admin/admin.php");
        exit();
    } elseif ($user['role'] === 'staff') {
        header("Location: staff/staff.php");
        exit();
    } elseif ($user['role'] === 'guest') {
        $_SESSION['room'] = $user['username'];
        header("Location: guest/guest.php");
        exit();
    }
} else {
    // Redirect back to login with error
    header("Location: login.php?error=Invalid username or password");
    exit();
}

$conn->close();
