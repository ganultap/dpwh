<?php
// Include the file containing the database connection
require_once 'db.php';

class User {
    public static function count() {
        global $connection; // Use the global connection variable

        // Check if the connection is null or not
        if ($connection === null) {
            // Handle the case where the connection is not initialized
            return false;
        }

        // Proceed with database query
        $result = $connection->query("SELECT COUNT(*) as count FROM users");
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public static function countByType($user_type) {
        global $connection; // Use the global connection variable

        // Check if the connection is null or not
        if ($connection === null) {
            // Handle the case where the connection is not initialized
            return false;
        }

        // Proceed with database query
        $result = $connection->query("SELECT COUNT(*) as count FROM users WHERE user_type = $user_type");
        $row = $result->fetch_assoc();
        return $row['count'];
    }
}
?>
