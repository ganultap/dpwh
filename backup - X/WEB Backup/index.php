<?php
include_once 'db_connect.php'; // Include your database connection file

// Initialize $user_type if necessary
$user_type = isset($user_type) ? $user_type : null;

// Set the current page and the number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 10;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" href="../dpwh_logo.png" type="image/x-icon">
    <title>DPWH BCDEO</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            background: linear-gradient(to right, rgba(247, 89, 41, 0.5), rgba(2, 5, 185, 0.5));
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Change height to min-height */
            display: flex;
            flex-direction: column;
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }
        .container {
            padding-top: 0;
            flex: 1; /* Add this to allow the container to grow */
        }

        .table {
            background-color: #fff;
            border-radius: 8px;
        }

        h4 {
            text-align: center;
            color: #333;
        }

        .search-form {
            display: flex;
            margin-top: 20px;
        }

        .search-input {
            flex: 1;
            border-radius: 5px 0 0 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }

        .search-button {
            border-radius: 0 5px 5px 0;
        }

        footer {
            width: 100%;
            background-color: #343a40;
            /* Dark background color for the footer */
            color: #ffffff;
            /* Text color for the footer */
            box-sizing: border-box; /* Include padding in width */
            flex-shrink: 0; /* Don't allow the footer to shrink */
        }
        .btn-dp-orange{
            background-color: #fc6b03;
            color: white;
        }
        .btn-dp-blue{
            background-color: #003DA5;
            color: white;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="../dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="d-inline-block align-top">
                DPWH Butuan City DEO
            </a>
            <div class="text-right">
            <?php
            // Assuming $user_type contains the user's type (1 or 2)
            if ($user_type == 1 && $user_type == 2) {
                echo "<a href='add_gazette.php' target: '_blank' class='btn btn-dp-blue'>Add</a> &nbsp;";
                echo "<a href='home.php' class='btn btn-dark'>Back</a>";
            }
            ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2 class="text-center">Latest News</h2>
            </div>
            <div class="card-body">
                <?php
                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='row news-thumbnail mt-2'>";
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
                        echo "<a href='full_view_gazette.php?id=" . $row['gazette_id'] . "' class='btn-sm btn-primary' target='_blank'>Read more</a>";
                        // Pass gazette_id as a query parameter
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p class='text-center'>No news available.</p>";
                }
                ?>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card zoom">
            <h5 class="card-header">Admin Panel</h5>
            <div class="card-body">
              <a href="./admin/" target="_blank" rel="noopener noreferrer">
                <img src="admin.png" class="card-img-top logo" alt="Testing">
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card zoom">
            <h5 class="card-header">Telephone Directory</h5>
            <div class="card-body">
              <a href="./directory.html" target="_blank" rel="noopener noreferrer">
                <img src="td.png" class="card-img-top logo" alt="Directory">
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card zoom">
            <h5 class="card-header">Authentication Portal</h5>
            <div class="card-body">
              <a href="https://gw.dpwh.gov.ph:6082/php/uid.php?vsys=1&rule=0" target="_blank" rel="noopener noreferrer">
                <img src="pa.png" class="card-img-top logo" alt="Authentication">
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card zoom">
            <h5 class="card-header">Market Survey Prices</h5>
            <div class="card-body">
              <a href="./marketSurvey.html" target="_blank" rel="noopener noreferrer">
                <img src="ms.png" class="card-img-top logo" alt="Market Survey">
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card zoom">
            <h5 class="card-header">Bingo!</h5>
            <div class="card-body">
              <a href="./bingo.html" target="_blank" rel="noopener noreferrer">
                <img src="bingo.png" class="card-img-top logo" alt="Bingo!">
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          <div class="card zoom">
            <h5 class="card-header">About us</h5>
            <div class="card-body">
              <a href="./about.html" target="_blank" rel="noopener noreferrer">
                <img src="dpwh_logo.png" class="card-img-top" alt="DPWH Logo">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        // Output pagination links
        $total_rows_sql = "SELECT COUNT(*) AS total FROM gazette";
        $total_rows_result = mysqli_query($conn, $total_rows_sql);
        $total_rows = mysqli_fetch_assoc($total_rows_result)['total'];
        $total_pages = ceil($total_rows / $records_per_page);

        // Output pagination links if there are multiple pages
        if ($total_pages > 1) {
            echo "<div class='text-center'>";
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='?page=$i' class='btn btn-sm btn-secondary'>" . $i . "</a>";
            }
            echo "</div>";
        }
        ?>
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
