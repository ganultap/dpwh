<?php
session_start();
include_once 'db_connect.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security (not needed for parameterized queries)
    $header = $_POST['header'];
    $author = $_POST['author'];
    $body = $_POST['body'];
    $date_time = $_POST['date_time']; // Assuming date_time is properly formatted in the datetime-local format
    $photo = $_POST['photo'];
    
    // Prepare an insert statement
    $sql = "INSERT INTO gazette (header, author, body, date_and_time, photo) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss", $header, $author, $body, $date_time, $photo);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Set success message
            $_SESSION['message'] = '<div style="background-color: rgba(0, 255, 0, 0.6); color: green; padding: 10px;">Gazette added successfully.</div>';
            // Redirect to a success page
            header("location: add_gazette.php");
            exit();
        } else {
            // Set error message
            $_SESSION['message'] = '<div style="background-color: rgba(255, 0, 0, 0.6); color: red; padding: 10px;">Oops! Something went wrong. Please try again later.</div>';
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}

// Redirect to add_gazette.php even if there was an error
header("location: add_gazette.php");
exit();
?>
