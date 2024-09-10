<?php
require_once('models/Item.php');
require_once('models/User.php');
require_once('db.php');

// Check if item_no is provided in the GET request
if (!isset($_GET['item_no'])) {
    echo json_encode(['error' => 'No item_no provided']);
    exit;
}

// Sanitize input to prevent SQL injection
$itemNo = intval($_GET['item_no']);

// Prepare and execute statement to fetch item data
$stmt = $connection->prepare("SELECT * FROM items WHERE item_no = ?");
$stmt->bind_param("i", $itemNo);
$stmt->execute();
$result = $stmt->get_result();

// Check if data is found
if ($result->num_rows > 0) {
    // Fetch and return data as JSON response
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Return error message if no data is found
    echo json_encode(['error' => 'No data found for the specified item ID']);
}

// Close statement
$stmt->close();
?>

