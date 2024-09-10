<?php
session_start();
include_once '../db_connect.php';

$gazette_id = $_GET['id'];

// Fetch the existing gazette entry data from the database
$sql = "SELECT header, author, body, date_and_time, photo FROM gazette WHERE gazette_id = ?";
$stmt = mysqli_prepare($conn, $sql);

// Check for SQL errors
if (!$stmt) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "i", $gazette_id);
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the data
$row = mysqli_fetch_assoc($result);

// Assign values to variables
$header = $row['header'];
$author = $row['author'];
$body = $row['body'];
$date_and_time = $row['date_and_time'];
$photo = $row['photo'];

// Close statement
mysqli_stmt_close($stmt);
// Close connection
mysqli_close($conn);
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
    <title>Edit Gazette</title>
</head>

<body>
    <!-- Form for editing gazette entry -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h5>Edit Gazette</h5>
            </div>
            <div class="card-body">
                <form action="update_gazette.php" method="POST">
                    <!-- Hidden input field to pass gazette_id to the update script -->
                    <input type="hidden" name="gazette_id" value="<?php echo $gazette_id; ?>">

                    <!-- Input fields for editing gazette entry -->
                    <label for="header">Header:</label><br>
                    <input class="form-control" type="text" id="header" name="header" value="<?php echo $header; ?>"><br>

                    <label for="author">Author:</label><br>
                    <input class="form-control" type="text" id="author" name="author" value="<?php echo $author; ?>"><br>

                    <label for="body">Body:</label><br>
                    <textarea class="form-control" id="body" name="body"><?php echo $body; ?></textarea><br>

                    <label for="date_and_time">Date and Time:</label><br>
                    <input class="form-control" type="datetime-local" id="date_and_time" name="date_and_time" value="<?php echo date('Y-m-d\TH:i', strtotime($date_and_time)); ?>"><br>

                    <label for="photo">Photo URL:</label><br>
                    <input class="form-control" type="text" id="photo" name="photo" value="<?php echo htmlspecialchars($photo); ?>"><br>

                    <!-- Display photo if it exists -->
                    <?php if (!empty($row["photo"])) : ?>
                        <img src="<?php echo htmlspecialchars($row["photo"]); ?>" alt="Thumbnail" class="card-img-top fixed-height-img" style="width: 40%;">
                    <?php endif; ?> <br>
                    <!-- Add input field for photo if needed -->

                    <!-- Submit button to update gazette entry -->
                    <div class="btn-group">
                        <button class="btn btn-secondary" href="../view_gazette">Cancel</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
