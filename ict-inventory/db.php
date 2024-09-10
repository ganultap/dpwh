<?php
// Development
// $host = "localhost"; // Your database host
// $username = "root"; // Your database username
// $password = ""; // Your database password
// $database = "admin_panel"; // Your database name

// // Production
$host = "10.13.190.2"; // Your database host
$username = "patlunagrl"; // Your database username
$password = "@Dpwh2024!"; // Your database password
$database = "admin_panel"; // Your database name

// Create connection
$connection = new mysqli($host, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
