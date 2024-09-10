<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
}

include_once("../db_connect.php");

// Initialize variables for search terms
$avg_search = '';
$avgResult = null;

// Get the search term for Average Cost and Actual Market Price
if (isset($_GET['avg_search'])) {
    $avg_search = $_GET['avg_search'];
}

// Modify the SQL query for Average Cost and Actual Market Price table
$avgQuery = "SELECT 
    item_no,
    CONCAT(e.equipment_name, ' ', s.sub_category, ' ', d.description) AS Equipment_Name,
    AVG(m.unit_cost) AS Average_Cost,
    AVG(m.unit_cost) * 1.1 AS Actual_Market_Price
FROM 
    market_survey_details m
JOIN 
    equipment_type e ON m.equipment_type_id = e.equipment_id
JOIN 
    equipment_sub_category s ON m.sub_cat_id = s.equipment_type_id
JOIN 
    equipment_description d ON m.description_id = d.sub_cat_id
JOIN 
    brand b ON m.brand_id = b.brand_id
WHERE 
    CONCAT(e.equipment_name, ' ', s.sub_category, ' ', d.description) LIKE ?
GROUP BY 
    item_no, Equipment_Name;";

// Prepare the statement
$avgStmt = mysqli_prepare($conn, $avgQuery);
if ($avgStmt === false) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Bind parameters for Average Cost and Actual Market Price table search
$avgSearchParam = "%$avg_search%";
mysqli_stmt_bind_param($avgStmt, "s", $avgSearchParam);

// Execute the statement for Average Cost and Actual Market Price table search
mysqli_stmt_execute($avgStmt);
$avgResult = mysqli_stmt_get_result($avgStmt);

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
    // Search functionality
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // Fetch data from the database
    $sql = "SELECT 
        m.id,
        m.item_no, 
        e.equipment_name, 
        s.sub_category, 
        d.description, 
        su.supplier_name, 
        b.brand_name, 
        m.model_name, 
        m.unit_cost, 
        m.quarter, 
        m.year 
    FROM 
        market_survey_details m
    JOIN 
        equipment_type e ON m.equipment_type_id = e.equipment_id
    JOIN 
        equipment_sub_category s ON m.sub_cat_id = s.equipment_type_id
    JOIN 
        equipment_description d ON m.description_id = d.sub_cat_id
    JOIN 
        suppliers su ON m.supplier_id = su.supplier_id
    JOIN 
        brand b ON m.brand_id = b.brand_id
    WHERE 
        m.id LIKE ? OR
        e.equipment_name LIKE ? OR 
        s.sub_category LIKE ? OR 
        d.description LIKE ? OR 
        su.supplier_name LIKE ? OR 
        b.brand_name LIKE ? OR 
        m.model_name LIKE ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Bind parameters
    $searchParam = "%$search%";
    mysqli_stmt_bind_param($stmt, "sssssss", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $searchParam);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if there is an error in the SQL query execution
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
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Market Survey Data</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="logo d-inline-block align-top">
                Market Survey
            </a>
            <?php
                // Check if there's a message to display
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    $message_type = $_SESSION['message_type'];
                    
                    // Display the message
                    echo "<div class='alert alert-$message_type'>$message</div>";
                    
                    // Clear the session variables
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                }
                ?>
            <div class="text-right">
                <div class="btn-group">
                <a href="../market_survey_view" target="_blank" class="btn btn-info">View Data</a>
                <a href="ms_add.php" class="btn btn-success">Add Data</a>
                <a href="../home" class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Market Survey Data</h4>
            </div>
            <div class="search container-fluid">
                <form action="" method="GET" class="search-form">
                    <input type="text" name="search" id="search-input" placeholder="Search..." class="search-input" value="<?php echo htmlspecialchars($search); ?>">
                </form>
                
            </div>
            <div class="table-responsive card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item No.</th>
                            <th>Equipment Type</th>
                            <th>Sub-Category</th>
                            <th>Description</th>
                            <th>Supplier</th>
                            <th>Brand</th>
                            <th>Model Name</th>
                            <th>Unit Cost</th>
                            <th>Quarter</th>
                            <th>Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['item_no'] . "</td>";
                            echo "<td>" . htmlspecialchars($row['equipment_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['sub_category']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['supplier_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['brand_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['model_name']) . "</td>";
                            echo "<td>" . number_format($row['unit_cost'], 2, '.', ',') . "</td>";
                            echo "<td>" . $row['quarter'] . "</td>";
                            echo "<td>" . $row['year'] . "</td>";
                            // Add edit and delete buttons
                            echo "<td>";
                            echo "<div class='btn-group'>";
                            echo "<a href='ms_edit.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Edit</a>";
                            echo "<a href='ms_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm ml-1'>Delete</a>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            
        </div>
    </div>
    <footer class="text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>
    <!-- Add this script at the end of your HTML body -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var typingTimer; // Timer identifier
        var doneTypingInterval = 500; // Delay in milliseconds (0.5 seconds)

        // Function to perform search
        function performSearch(searchValue) {
            $.ajax({
                url: 'ms_data_search.php', // Replace 'search.php' with your actual PHP file handling the search
                type: 'GET',
                data: { search: searchValue },
                success: function(response) {
                    $('.table tbody').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }

        // Event listener for search input
        $('#search-input').on('input', function() {
            clearTimeout(typingTimer); // Clear the previous timer

            var searchValue = $(this).val();

            // Set a timer to wait before sending the AJAX request
            typingTimer = setTimeout(function() {
                performSearch(searchValue);
            }, doneTypingInterval);
        });
    });
    </script>


</body>

</html>

<?php
} else {
    header("Location: ../home");
    exit();
}
?>
