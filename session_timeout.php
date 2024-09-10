<?php
// Set session timeout to 30 minutes (in seconds)
$session_timeout = 30 * 60; // 30 minutes * 60 seconds

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to index.php with a message if not logged in
    header("Location: login");
    exit; // Stop further execution
}

// Check if a session is already active
if (session_status() == PHP_SESSION_ACTIVE) {
    // Output a warning or handle it as needed
    // Since session settings can't be changed after the session is active
    // You might want to handle this situation appropriately for your application
    // For example, log an error or display a message to the user
} else {
    // Start a new session
    session_start([
        'gc_maxlifetime' => $session_timeout,
        'cookie_lifetime' => $session_timeout,
    ]);
    // Set the session timeout
    ini_set('session.gc_maxlifetime', $session_timeout);
    // Set cookie lifetime for the session
    session_set_cookie_params($session_timeout);
    // Regenerate session ID to prevent session fixation attacks
    session_regenerate_id(true);
}
?>
