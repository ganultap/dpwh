<?php
session_start(); // Start the session

// Assuming you have stored user_type in the session variable $_SESSION['user_type']
$user_type = $_SESSION['user_type'] ?? null; // Using the null coalescing operator to handle cases where the session variable is not set

// Check if user_type is less than 3, otherwise redirect to another page
if (!isset($_SESSION['user_type']) && $_SESSION['user_type'] < 3) {
    header("location: ../home"); // Redirect to unauthorized page
    exit(); // Stop further execution
}

include_once '../db_connect.php'; // Include your database connection file

// Initialize a variable to hold the message
$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $header = mysqli_real_escape_string($conn, $_POST['header']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $date_time = $_POST['date_time']; // Assuming date_time is properly formatted in the datetime-local format
    $photo = mysqli_real_escape_string($conn, $_POST['photo']); // Assuming photo URL is provided by the user

    // Prepare an insert statement
    $sql = "INSERT INTO gazette (header, author, body, date_and_time, photo) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssss", $header, $author, $body, $date_time, $photo);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Set success message
            $message = "Submission successful!";
            // Redirect to a success page
            header("location: ./");
            exit();
        } else {
            // Error handling if execution fails
            $message = "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <title>Gazette</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="d-inline-block align-top">
                Gazette
            </a>
            <div class="text-right">
            <a href="../view_gazette" class="btn btn-dp-orange text-white">View</a>
            <a href="../home" class="btn btn-dark">Back</a>

        </div>
    </nav>
    <div class="container">
        <div class="row">
            <!-- Input Form for Gazette or News Page -->
            <div class="col-md-6 offset-md-3">
                <div class="card mt-4 mb-4">
                    <h5 class="card-header text-center">Add Gazette</h5>
                    <?php 
                    // Check if message is set
                        if (isset($_SESSION['message'])) {
                            echo '<div class="alert">' . $_SESSION['message'] . '</div>';
                            // Unset the message to prevent displaying it again on page refresh
                            unset($_SESSION['message']);
                    }?>
                    <div class="card-body">
                        <!-- Display message -->
                        <?php if ($message): ?>
                            <div class="alert <?php echo $message ? 'alert-success' : 'alert-danger'; ?> mt-3" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php endif; ?>
                        <!-- End of display message -->
                        <form action="process_gazette.php" method="POST">
                            <div class="mb-3">
                                <label for="header" class="form-label">Header</label>
                                <input type="text" class="form-control" id="header" name="header" required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author" required>
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <div id="body-editor" contenteditable="true" class="form-control"
                                    style="height: 150px; overflow-y: auto;" required></div>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        onclick="formatText('bold')"><strong>B</strong></button>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        onclick="formatText('italic')"><em>I</em></button>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        onclick="formatText('underline')"><u>U</u></button>
                                </div>
                                <input type="hidden" id="body" name="body" required>
                            </div>

                            <div class="mb-3">
                                <label for="date_time" class="form-label">Date and Time</label>
                                <input type="datetime-local" class="form-control" id="date_time" name="date_time"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo URL</label>
                                <input type="text" class="form-control" id="photo" name="photo" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights
                reserved.</p>
        </div>
    </footer>
    <!-- Place the first <script> tag in your HTML's <head> -->
    <script>
        function formatText(command) {
            document.execCommand(command, false, null);
        }

        // Update hidden input field with formatted text
        document.getElementById('body-editor').addEventListener('input', function () {
            var formattedText = this.innerHTML;
            document.getElementById('body').value = formattedText;
        });

        function getCurrentDateTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = (now.getMonth() + 1).toString().padStart(2, '0');
            var day = now.getDate().toString().padStart(2, '0');
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var datetime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
            return datetime;
        }

        // Set the default value of date and time input field to the current date and time
        document.getElementById('date_time').value = getCurrentDateTime();
    </script>

</body>

</html>
