<?php
session_start();
require_once('../db.php');

class Auth {
    public static function attempt($conn, $username, $password) {
        if (empty($username) || empty($password)) {
            return false;
        }

        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $row['user_type'];
                return true; // Successful login
            } else {
                return false; // Incorrect password
            }
        } else {
            return false; // Invalid account
        }
    }

    public static function userExist($conn, $username) {
        if (empty($username)) {
            return false;
        }

        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->num_rows > 0;
    }
}

class Session {
    public static function login($username) {
        $_SESSION['username'] = $username;
        $_SESSION['last_activity'] = time(); // Store the current time
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }

    public static function checkTimeout() {
        $timeout = 1800; // 30 minutes in seconds
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
            self::logout();
            return true;
        }
        $_SESSION['last_activity'] = time(); // Update last activity time
        return false;
    }
}

class LoginController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($request) {
        // Check if session has timed out
        if (Session::checkTimeout()) {
            $_SESSION['error'] = 'Session timed out. Please log in again.';
            $this->redirectTo('./');
            return;
        }

        // Continue with login logic
        $username = $request['username'] ?? '';
        $password = $request['password'] ?? '';

        if (Auth::attempt($this->conn, $username, $password)) {
            Session::login($username);
            $_SESSION['success'] = strtoupper($username);
            $this->redirectTo('../');
        } else {
            // Check if the username exists in the database
            if (Auth::userExist($this->conn, $username)) {
                // Username exists, but password is incorrect
                $this->setErrorMessage('Incorrect password');
            } else {
                // Username doesn't exist
                $this->setErrorMessage('Invalid username');
            }
            $this->redirectTo('./');
        }
    }

    private function setErrorMessage($message) {
        $_SESSION['error'] = $message;
    }

    private function redirectTo($location) {
        header("Location: $location");
        exit;
    }

    public function logout() {
        Session::logout();
        $_SESSION['success'] = 'Logged out successfully';
        $this->redirectTo('./');
    }
}

$loginController = new LoginController($connection);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->login($_POST);
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $loginController->logout();
}
?>
