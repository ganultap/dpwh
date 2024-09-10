<?php

session_start();
include_once '../db_connect.php';

// Function to end the session
function logout() {
    session_unset();
    session_destroy();
    header("Location: ../login");
    exit();
}

// Check if the user is logged in, redirect to index.php if not
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
}

// Check if the logout button is clicked
if (isset($_POST['logout-btn'])) {
    logout();
}

// Check if session variable 'last_activity' is set
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
    // If last activity was more than 30 minutes ago, destroy the session and redirect to login
    session_unset();
    session_destroy();
    header("Location: ../login");
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Get and echo the user type
$user_type = $_SESSION['user_type'];

// Check if the "Add User" button should be displayed
$showAddUserButton = ($user_type == '1');

$background_color = '';
if ($user_type == 1) {
    $background_color = '#E52B50';
} elseif ($user_type == 2) {
    $background_color = '#007474';
} else {
    $background_color = '#0014A8';
}

// Display a message if the user doesn't have enough privilege to access market_survey.php
if ($_SERVER['PHP_SELF'] == '/market_survey.php' && $user_type != 1) {
    echo "<p style='color: red; font-weight: bold;'>You don't have enough privilege to access this page.</p>";
}