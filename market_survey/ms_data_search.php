<?php
// Start session and include necessary files
session_start();
include_once("../db_connect.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
}

// Fetch search term from GET request
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Construct SQL query to fetch search results
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

// Check if there are any search results
if ($result->num_rows > 0) {
    // Generate HTML for table rows
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
} else {
    echo "<tr><td colspan='11'>No results found</td></tr>"; // Output message for no results
}

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
