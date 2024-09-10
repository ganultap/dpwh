<?php

// Include the file containing the database connection
require_once 'db.php';

class ItemController {
    private $connection; // Database connection object

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function store($requestData) {
        // Define validation rules
        $requiredFields = ['equipment_type', 'acquisition_type'];
        foreach ($requiredFields as $field) {
            if (!isset($requestData[$field]) || empty($requestData[$field])) {
                return json_encode(['error' => ucfirst($field) . ' is required.']);
            }
        }

        try {
            // Insert item data into 'items' table
            $result = $this->connection->insert('items', $requestData);

            // Check if the item was successfully inserted
            if (!$result) {
                return json_encode(['error' => 'Failed to store the item. Please try again.']);
            }
            
            // Return success message
            return json_encode(['success' => 'Item has been successfully added.']);
        } catch (\Exception $e) {
            // Log or handle the error as needed
            return json_encode(['error' => 'Failed to store the item. Please try again.']);
        }
    }
}

// Example usage:
// Assuming $requestData contains the data sent in the request
// Assuming $connection is the database connection object created in db.php
$itemController = new ItemController($connection);
echo $itemController->store($requestData);
?>
