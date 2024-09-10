<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("../db_connect.php");

// Handle search functionality and filters
$avg_search = isset($_GET['avg_search']) ? $_GET['avg_search'] : '';
$quarter_filter = isset($_GET['quarter']) ? $_GET['quarter'] : '';
$year_filter = isset($_GET['year']) ? $_GET['year'] : '';

// Ensure that both quarter and year are selected
if (!empty($quarter_filter) && !empty($year_filter)) {
    // Build the base query
    $avgQuery = "SELECT 
        item_no, quarter, year,
        CONCAT(s.sub_category, ' ', e.equipment_name, ' ', '[', d.description, ']') AS Equipment_Name,
        ROUND(AVG(m.unit_cost), 2) AS Average_Cost,
        (ROUND(AVG(m.unit_cost), 2) * 0.1) + ROUND(AVG(m.unit_cost), 2) AS Actual_Market_Price
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
        quarter = ? AND year = ?";

    // Add search filter if present
    if (!empty($avg_search)) {
        $avgQuery .= " AND CONCAT(e.equipment_name, ' ', s.sub_category, ' ', d.description) LIKE ? OR item_no LIKE ?";
        $searchParam = "%$avg_search%";
        $params = [$quarter_filter, $year_filter, $searchParam, $searchParam];
        $types = "ssss";
    } else {
        $params = [$quarter_filter, $year_filter];
        $types = "ss";
    }

    // Add GROUP BY clause
    $avgQuery .= " GROUP BY item_no, Equipment_Name";

    // Prepare the statement
    $avgStmt = mysqli_prepare($conn, $avgQuery);
    if ($avgStmt === false) {
        echo "Error preparing statement: " . mysqli_error($conn);
        exit();
    }

    // Bind parameters
    mysqli_stmt_bind_param($avgStmt, $types, ...$params);

    // Execute the statement
    $result = mysqli_stmt_execute($avgStmt);
    if ($result === false) {
        echo "Error executing statement: " . mysqli_stmt_error($avgStmt);
        exit();
    }

    // Get result set
    $avgResult = mysqli_stmt_get_result($avgStmt);

    // Check if result set is valid
    if ($avgResult === false) {
        echo "Error getting result set: " . mysqli_stmt_error($avgStmt);
        exit();
    }

    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($avgResult)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['quarter']) . '</td>';
        echo '<td>' . htmlspecialchars($row['year']) . '</td>';
        echo '<td>' . htmlspecialchars($row['item_no']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Equipment_Name']) . '</td>';
        echo '<td style="text-align: right;"><span style="color: green; font-weight: bold;">&#8369; ' . number_format($row['Average_Cost'], 2, '.', ',') . '</td>';
        // echo '<td style="text-align: right;"><span style="color: green; font-weight: bold;">&#8369; ' . number_format($row['Actual_Market_Price'], 2, '.', ',') . '</span></td>';
        echo '</tr>';
    }

    // Close statement
    mysqli_stmt_close($avgStmt);
} else {
    echo "<tr><td colspan='6' class='text-center'>Please select both Year and Quarter to filter results.</td></tr>";
}

// Close connection
mysqli_close($conn);
?>
