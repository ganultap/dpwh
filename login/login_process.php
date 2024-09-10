<?php
include_once "../db_connect.php";

// Retrieve form data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate form data
if (empty($username) || empty($password)) {
    header("Location: ./?error=3"); // Redirect with an error parameter for empty fields
    exit();
}

// Use prepared statement to prevent SQL injection
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Start session and set user data
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = $row['user_type']; // Assuming 'user_type' is a column in your 'users' table

        header("Location: ../home"); // Redirect to home/index.php
        exit(); // Ensure that no other code is executed after the redirect
    } else {
        header("Location: ./?error=1"); // Redirect with an error parameter for invalid password
        exit();
    }
} else {
    header("Location: ./?error=2"); // Redirect with an error parameter for user not found
    exit();
}
