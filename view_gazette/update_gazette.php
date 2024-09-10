<?php
include_once '../db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security (not needed for parameterized queries)
    $gazette_id = $_POST['gazette_id'];
    $header = $_POST['header'];
    $author = $_POST['author'];
    $body = $_POST['body'];
    $date_and_time = $_POST['date_and_time']; // Assuming date_and_time is properly formatted in the datetime-local format
    $photo = $_POST['photo'];

    // Prepare an update statement
    $sql = "UPDATE gazette SET header=?, author=?, body=?, date_and_time=?, photo=? WHERE gazette_id=?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssi", $header, $author, $body, $date_and_time, $photo, $gazette_id);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to view_gazette.php or any other page after successful update
            header("location: ../view_gazette");
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

// Redirect to edit_gazette.php if there was an error
header("location: ../view_gazette?id=" . $gazette_id);
exit();
?>
