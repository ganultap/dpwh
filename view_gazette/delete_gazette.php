<?php
include_once '../db_connect.php';

// Check if the gazette_id is provided
if (isset($_GET['id'])) {
    $gazette_id = $_GET['id'];

    // Check if a confirmation is received
    if(isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Prepare a delete statement
        $sql = "DELETE FROM gazette WHERE gazette_id=?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind the gazette_id parameter
            mysqli_stmt_bind_param($stmt, "i", $gazette_id);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to view_gazette.php or any other page after successful deletion
                header("location: ./");
                exit();
            } else {
                // Handle error if deletion fails
                echo "Error: " . mysqli_error($conn);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }

        // Close connection
        mysqli_close($conn);
    } else {
        // If confirmation is not received, prompt the user for confirmation
        echo '<script>
                var confirmed = confirm("Are you sure you want to delete this gazette?");
                if(confirmed) {
                    window.location.href = "./delete_gazette.php?id=' . $gazette_id . '&confirm=yes";
                } else {
                    window.location.href = "./";
                }
              </script>';
    }
} else {
    // Redirect to view_gazette.php or any other page if gazette_id is not provided
    header("location: ./");
    exit();
}
?>
