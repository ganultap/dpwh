<?php

session_start();
require_once('models/Item.php');
require_once('models/User.php');
require_once('db.php'); // Include the database connection file

class ItemController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function store($requestData)
{
    // Define validation rules with custom message
    $validationRules = [
        'equipment_type' => ['required'],
        'acquisition_type' => ['required'],
        'inventory_item_no' => ['required']
        // Remove computer_name from validation rules
        // Add validation rules for other attributes here
    ];

    // Custom error messages
    $errorMessages = [
        'equipment_type.required' => 'Equipment type is required.',
        'acquisition_type.required' => 'Acquisition type is required.',
        'inventory_item_no.required' => 'Inventory item number is required.'
        // Remove computer_name from custom error messages
        // Add custom error messages for other attributes here
    ];

    // Validate request data
    $validatedData = $this->validateRequest($requestData, $validationRules, $errorMessages);

    if (!$validatedData) {
        header('Location: ../?error=Validation failed');
        exit;
    }

    try {
        // Create a new item instance
        $item = Item::create($validatedData);

        // Set success message
        if (!$item) {
            header('Location: ./?error=Failed to store the item.');
            exit;
        }
        
        header('Location: ./?success=Items has been successfully added.');
        exit;
    } catch (\Exception $e) {
        // Log or handle the error as needed
        header('Location: ./?error=Failed to store the item: ' . $e->getMessage());
        exit;
    }
}


    private function validateRequest($data, $rules, $messages) {
        $errors = [];
        
        foreach ($rules as $key => $rule) {
            if (!isset($data[$key]) || empty($data[$key])) {
                $errors[] = 'The field ' . $key . ' is missing or empty.';
            }
        }

        if (!empty($errors)) {
            // Return errors if validation fails
            return ['errors' => $errors];
        }

        // Return validated data if no errors
        return $data;
    }
}

// Example usage:
$itemController = new ItemController($connection); // Pass the database connection to the controller
$requestData = $_POST; // Assuming request data comes from POST
$response = $itemController->store($requestData);

// Handle response based on success or error
if (isset($response['success'])) {
    echo $response['success'];
} elseif (isset($response['error'])) {
    echo $response['error'];
} elseif (isset($response['errors'])) {
    // Convert the errors to an array if it's a string
    $errors = is_array($response['errors']) ? $response['errors'] : [$response['errors']];
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}
