<?php
// Include necessary files and configurations
require_once 'db.php'; // Include your database connection file

// Check if item_no is provided in the URL parameters
if(isset($_GET['item_no'])) {
    // Sanitize and validate the item_no
    $itemNo = $_GET['item_no'];
    
    // Check if the item_no is not empty and is a valid integer
    if(!empty($itemNo) && is_numeric($itemNo)) {
        // Prepare and execute the DELETE query
        $sql = "DELETE FROM items WHERE item_no = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $itemNo);
        
        if ($stmt->execute()) {
            // Return success message
            header('Location: ./?success=Item has been successfully deleted.');
            exit(); // Exiting here to prevent further execution
        } else {
            // Return error message if deletion fails
            header('Location: ./?error=Failed to delete the item.');
            exit(); // Exiting here to prevent further execution
        }
    } else {
        // Return error message if item_no is empty or invalid
        header('Location: ./?error=Failed to delete the item. Invalid item_no.');
        exit(); // Exiting here to prevent further execution
    }
} else {
    // Return error message if item_no is not provided
    header('Location: ./?error=Item number not provided');
    exit(); // Exiting here to prevent further execution
}
