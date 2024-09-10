<?php
// Database connection parameters
$servername = "10.13.190.2";
$username = "patlunagrl";
$password = "@Dpwh2024!";
$database = "admin_panel";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the character set to UTF-8 (optional, depending on your requirements)
$conn->set_charset("utf8mb4");
?>
