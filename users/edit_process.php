<?php
// Start the session
session_start();

// Include the database connection file
require_once '../db_connect.php';

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Retrieve and sanitize form data
$id = sanitize_input($_POST['id'] ?? '');
$new_username = sanitize_input($_POST['new_username'] ?? '');
$new_password = password_hash(sanitize_input($_POST['new_password'] ?? ''), PASSWORD_DEFAULT);
$new_user_type = sanitize_input($_POST['new_user_type'] ?? '');
$current_password = sanitize_input($_POST['current_password'] ?? '');

// Check if the current password is correct
$check_password_query = $conn->prepare("SELECT password FROM users WHERE id = ?");
$check_password_query->bind_param("i", $id);
$check_password_query->execute();
$check_password_query->store_result();
$check_password_query->bind_result($hashed_password);
$check_password_query->fetch();

if (password_verify($current_password, $hashed_password)) {
    // Update user in the database
    $update_user_query = $conn->prepare("UPDATE users SET username = ?, password = ?, user_type = ? WHERE id = ?");
    $update_user_query->bind_param("sssi", $new_username, $new_password, $new_user_type, $id);

    if ($update_user_query->execute()) {
        // Update successful
        $_SESSION['update_message'] = "User information updated successfully!";
        $_SESSION['update_message_type'] = "success";
    } else {
        // Update failed
        $_SESSION['update_message'] = "Error updating user information. Please try again.";
        $_SESSION['update_message_type'] = "danger";
    }

    // Close prepared statement
    $update_user_query->close();
} else {
    // Current password is incorrect
    $_SESSION['update_message'] = "Incorrect current password. Please try again.";
    $_SESSION['update_message_type'] = "danger";
}

// Close password check statement
$check_password_query->close();

// Close database connection
$conn->close();

// Redirect back to the edit.php page
header("Location: edit_user.php?id=$id");
exit();
?>
