<?php
session_start();
include_once '../db_connect.php';

$user_type = isset($_SESSION['user_type']) ? $_SESSION['user_type'] : null;

// Initialize search variables
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '%' . $search . '%';

// Set the current page and the number of records per page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 3;
$offset = ($current_page - 1) * $records_per_page;

// Fetch data from the gazette table using prepared statement with pagination and search
$sql = "SELECT gazette_id, header, photo, author, date_and_time, body FROM gazette WHERE header LIKE ? OR author LIKE ? OR body LIKE ? ORDER BY date_and_time DESC LIMIT ?, ?";
$stmt = mysqli_prepare($conn, $sql);

// Check for SQL errors
if (!$stmt) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "sssss", $search_query, $search_query, $search_query, $offset, $records_per_page);
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
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <title>Latest News</title>

</head>
<style>
    .form-floating {
        position: relative;
    }
    .form-inline {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-content {
        display: flex;
        align-items: center;
    }
    .form-floating input,
    .form-floating label {
        font-size: 16px; /* Adjust the font size as needed */
        border: none;
        outline: none;
        background-color: transparent;
        transition: all 0.3s ease;
    }

    .form-floating input:focus,
    .form-floating input:not(:placeholder-shown) {
        padding-top: 10px;
    }

    .form-floating label {
        position: absolute;
        left: 0;
        top: 0;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-floating input:focus + label,
    .form-floating input:not(:placeholder-shown) + label {
        top: -15px;
        font-size: 12px; /* Adjust the font size as needed */
        color: #6c757d; /* Adjust the color as needed */
    }
</style>

<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="d-inline-block align-top">
                Gazette
            </a>
            <?php
                // Check if the session message is set and not empty
                if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                    // Display the error message
                    echo $_SESSION['message'];
                    // Clear the session message to prevent it from displaying again
                    unset($_SESSION['message']);
                }
                ?>

            <div class="text-right">
            <?php
            // Assuming $user_type contains the user's type (1 or 2)
            if ($user_type == 1 || $user_type == 2) {
                echo "<div class='btn-group'>";
                echo "<a href='../add_gazette' target='_blank' class='btn btn-primary'>Add</a>";
                echo "<a href='../home' class='btn btn-dark'>Back</a>";
                echo "</div>";
            }
            ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-4 mb-4">
            <div class="card-header dp-orange">
                    <h2 class="text-center">LATEST NEWS</h2>
                    <form class="form-inline form-floating border border-1 p-2" action="" method="GET">
                        <input class="form-control mr-sm-2 form-floating" type="search" placeholder="Search News" aria-label="Search" name="search">
                        <label class="border-1" for="search">Search News</label>
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                    </form>
            </div>
            <div class="card-body">
            <?php
// Check if there are any rows returned
            if (mysqli_num_rows($result) > 0) {
                // Counter for tracking cards per row
                $cards_per_row = 0;
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    // If the number of cards per row exceeds 3, start a new row
                    if ($cards_per_row % 3 == 0) {
                        echo "<div class='row news-row mt-2'>";
                    }
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-img-container'>"; // Add this container
                    echo "<img src='" . htmlspecialchars($row["photo"]) . "' alt='Thumbnail' class='card-img-top fixed-height-img'>";
                    echo "</div>"; // Close the container
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><strong>" . htmlspecialchars($row["header"]) . "</strong></h5>";
                    echo "<p class='card-text'><strong>Author:</strong> " . htmlspecialchars($row["author"]) . "</p>";
                    echo "<p class='card-text'><strong>Date Uploaded:</strong> " . htmlspecialchars(date("F j, Y g:i A", strtotime($row["date_and_time"]))) . "</p>";
                    echo "<p class='card-text'>" . substr(strip_tags($row["body"]), 0, 150) . "...</p>";
                    echo "<div class='bg-dp-blue'>";
                    echo "<div class='btn-group justify-content-end'>";
                    echo "<a href='../full_view_gazette.php?id=" . $row['gazette_id'] . "' class='btn btn-dp-orange btn-sm'>Read more</a>";
                    if ($user_type == 1 || $user_type == 2) {
                    echo "<a href='edit_gazette.php?id=" . $row['gazette_id'] . "' class='btn btn-info btn-sm'>Edit</a>";
                    echo "<button onclick=\"window.location.href='delete_gazette.php?id=" . $row['gazette_id'] . "'\" class='btn btn-danger btn-sm'>Delete</button>";
                    }
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    // Increment the counter
                    $cards_per_row++;
                    // If the maximum number of cards per row is reached, close the row
                    if ($cards_per_row % 3 == 0 || $cards_per_row == 9) {
                        echo "</div>";
                    }
                    // If the maximum number of cards is reached, break the loop
                    if ($cards_per_row == 9) {
                        break;
                    }
                }
            } else {
                echo "<p class='text-center'>No news available.</p>";
            }
            ?>

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
            echo "<div class='text-center'>"; // Opening the container with the 'text-right' class

            // Output link for page 1
            echo "<a href='?page=1' class='btn btn-sm " . ($current_page == 1 ? "btn-dp-orange" : "btn-secondary") . "'>1</a>";

            // Output links for other pages
            for ($i = 2; $i <= $total_pages; $i++) {
                echo "<a href='?page=$i' class='btn btn-sm " . ($current_page == $i ? "btn-dp-orange" : "btn-secondary") . "'>" . $i . "</a>";
            }
            echo "</div>"; // Closing the container
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
