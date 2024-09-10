<?php
include_once 'db_connect.php'; // Include your database connection file

// Retrieve the gazette_id from the query parameter
$gazette_id = $_GET['id'];
$user_type = $_SESSION['user_type'] ?? null;
// Fetch the specific gazette record using prepared statement
$sql = "SELECT * FROM gazette WHERE gazette_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $gazette_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if the gazette record exists
if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fv_gazette.css">
    <link rel="icon" href="images/dpwh_logo.png" type="image/x-icon">
    <title><?php echo htmlspecialchars($row["header"]); ?></title>
    <style>
        
    </style>
</head>

<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="d-inline-block align-top">
                Gazette
            </a>
            <div class="text-right">
            <?php
            // Assuming $user_type contains the user's type (1 or 2)
            if ($user_type == 1 && $user_type == 2) {
                echo "<a href='add_gazette.php' class='btn btn-dp-blue'>Add</a> &nbsp;";
                echo "<a href='home.php' class='btn btn-dark'>Back</a>";
            }
            ?>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <strong><h2 class="text-center mt-2"><?php echo htmlspecialchars($row["header"]); ?></h2></strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <p><strong>Author:</strong> <?php echo htmlspecialchars($row["author"]); ?></p> -->
                        <?php echo "<div class='text-center'>";
                        echo "<img src='" . htmlspecialchars($row["photo"]) . "' alt='Thumbnail'>";
                        echo "</div>";
                        ?>
                        <div class="text-center mt-2">
                        <p><strong>Date Uploaded:</strong> <?php echo htmlspecialchars(date("F j, Y g:i A", strtotime($row["date_and_time"]))); ?></p>
                        </div>
                        <div class="container">
                            <p><?php echo $row["body"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center mt-4">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
<?php
} else {
    // If gazette record not found, display error message
    echo "Gazette not found.";
}
?>
