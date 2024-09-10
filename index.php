<?php
include_once 'db_connect.php'; // Include your database connection file

// Initialize $user_type if necessary
$user_type = isset($user_type) ? $user_type : null;

// Set the current page and the number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 2; // Show only 2 table rows per page
$offset = ($current_page - 1) * $records_per_page;

// Fetch data from the gazette table using prepared statement with pagination
$sql = "SELECT gazette_id, header, photo, author, date_and_time, body FROM gazette ORDER BY date_and_time DESC LIMIT ?, ?";
$stmt = mysqli_prepare($conn, $sql);

// Check for SQL errors
if (!$stmt) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "ii", $offset, $records_per_page);
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check for database connection errors
if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="images/dpwh_logo.png" type="image/x-icon">
    <title>DPWH BCDEO</title>
    <style>
        
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="card">
        <div class="card-header dp-orange ">
            <h3 class=""><img src="images/dpwh_logo.png" alt="DPWH Logo" style="height: 35px; width: 35px;">&nbsp; LATEST NEWS</h3>
        </div>
        <div class="card border-bottom">
            <div class="card-body">
                <?php
                         // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Output data of each row
                        $count = 0; // Initialize a counter
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($count % 2 == 0) {
                                // If count is even, start a new row
                                echo "<div class='row'>";
                            }
                            echo "<div class='col-md-6'>";
                            echo "<div class='news-thumbnail mt-2'>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo "<div class='thumbnail'>";
                            echo "<img src='" . htmlspecialchars($row["photo"]) . "' alt='Thumbnail' class='img-thumbnail'>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='col-md-8 content'>";
                            echo "<h5><strong>" . htmlspecialchars($row["header"]) . "</strong></h5>";
                            echo "<p><strong>Author:</strong> " . htmlspecialchars($row["author"]) . "</p>";
                            echo "<p><strong>Date Uploaded:</strong> " . htmlspecialchars(date("F j, Y g:i A", strtotime($row["date_and_time"]))) . "</p>"; // Displaying date and time
                            echo "<p>" . substr(strip_tags($row["body"]), 0, 200) . "...</p>";
                            echo "<a href='full_view_gazette.php?id=" . $row['gazette_id'] . "' class='btn btn-dp-blue btn-sm' target='_blank'>Read more</a>";
                            // Pass gazette_id as a query parameter
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";

                            $count++; // Increment the counter

                            if ($count % 2 == 0) {
                                // If count is even, close the row
                                echo "</div>";
                            }
                        }

                        if ($count % 2 != 0) {
                            // If the number of news items is odd, close the row
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='text-center'>No news available.</p>";
                    }
                    ?>
            </div>
            <?php
                // Output pagination links
                $total_rows_sql = "SELECT COUNT(*) AS total FROM gazette LIMIT 1";
                $total_rows_result = mysqli_query($conn, $total_rows_sql);
                $total_rows = mysqli_fetch_assoc($total_rows_result)['total'];
                $total_pages = ceil($total_rows / $records_per_page);

                // Get the current page number from the URL parameter
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                // Output pagination links if there are multiple pages
                // if ($total_pages > 1) {
                //     echo "<div class='text-right'>"; // Opening the container with the 'text-right' class

                //     // Output link for page 1
                //     echo "<a href='?page=1' class='btn btn-sm " . ($current_page == 1 ? "btn-dp-orange" : "btn-secondary") . "'>1</a>";

                //     // Output links for other pages
                //     for ($i = 2; $i <= $total_pages; $i++) {
                //         echo "<a href='?page=$i' class='btn btn-sm " . ($current_page == $i ? "btn-dp-orange" : "btn-secondary") . "'>" . $i . "</a>";
                //     }
                //     echo "</div>"; // Closing the container
                // }
                ?>
        </div>
        
        <div class="text-right card-footer">
        <div class="btn-group">
            <a class="btn btn-dp-orange btn-sm" href="ping-tool">Ping Tool</a>
            <a class="btn btn-secondary btn-sm" href="bingo" target="_blank" rel="noopener noreferrer">Bingo</a>
            <a class="btn btn-dp-orange btn-sm" href="https://gw.dpwh.gov.ph:6082/php/uid.php?vsys=1&rule=0">Authentication</a>
            <a class="btn btn-secondary btn-sm" href="about">About</a>
            <a href="view_gazette" class="btn btn-dp-orange text-right btn-sm border-left" target="_blank" rel="noopener noreferrer">More News</a>
            </div>
        
        </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card-sm zoom mb-2">
                    <h5 class="card-header">Admin Panel</h5>
                    <div class="card-body">
                        <a href="home" target="_blank" rel="noopener noreferrer">
                            <img src="images/admin.png" class="card-img-top logo" alt="Testing">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-sm zoom mb-2">
                    <h5 class="card-header">Directory</h5>
                    <div class="card-body">
                        <a href="directory" target="_blank" rel="noopener noreferrer">
                            <img src="images/td.png" class="card-img-top logo" alt="Directory">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-sm zoom mb-2">
                    <h5 class="card-header">Market Survey</h5>
                    <div class="card-body">
                        <a href="market_survey_view" target="_blank" rel="noopener noreferrer">
                            <img src="images/ms.png" class="card-img-top logo" alt="Market Survey">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-sm zoom mb-2">
                    <h5 class="card-header">Inventory</h5>
                    <div class="card-body">
                        <a href="../ict-inventory/" target="_blank" rel="noopener noreferrer">
                            <img src="images/dashboard.png" class="card-img-top logo" alt="Inventory">
                        </a>
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
// Close statement
mysqli_stmt_close($stmt);
// Close connection
mysqli_close($conn);
?>
