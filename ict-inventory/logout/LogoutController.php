<?php

// Start the session
session_start();
require_once('db.php');

class LogoutController {
    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout()
    {
        // Destroy the session
        session_unset();
        session_destroy();

        // Redirect the user to the login page
        header('Location: /'); // Update with the actual login page URL
        exit;
    }
}

// Instantiate the LogoutController
$logoutController = new LogoutController();

// Call the logout method
$logoutController->logout();
