<?php
// Start the session
session_start();

// Include the database connection file
require_once '../db_connect.php';

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $username = sanitize_input($_POST['username'] ?? '');
    $password = sanitize_input($_POST['password'] ?? '');
    $user_type = sanitize_input($_POST['user_type'] ?? '');

    // Validate input data
    if (empty($username) || empty($password) || empty($user_type)) {
        $_SESSION['message'] = "All fields are required.";
        $_SESSION['message_type'] = "danger";
    } else {
        // Check if the username is already taken
        $check_username_query = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $check_username_query->bind_param("s", $username);
        $check_username_query->execute();
        $check_username_result = $check_username_query->get_result();

        if ($check_username_result->num_rows > 0) {
            // Username is already taken
            $_SESSION['message'] = "Username is already taken. Please choose another one.";
            $_SESSION['message_type'] = "danger";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into the database
            $insert_user_query = $conn->prepare("INSERT INTO users (username, password, user_type) VALUES (?, ?, ?)");
            $insert_user_query->bind_param("sss", $username, $hashed_password, $user_type);

            if ($insert_user_query->execute()) {
                // Registration successful
                $_SESSION['message'] = "<strong>" . strtoupper($username) . "</strong> is now part of the team.";
                $_SESSION['message_type'] = "success";
            } else {
                // Registration failed
                $_SESSION['message'] = "Error in registration. Please try again.";
                $_SESSION['message_type'] = "danger";
            }

            // Close the insert user query
            $insert_user_query->close();
        }

        // Close the check username query
        $check_username_query->close();
    }
}

// Close the database connection
$conn->close();

// Redirect back to the registration form
header("Location: ../register");
exit();
