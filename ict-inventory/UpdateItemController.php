<?php
session_start();
require_once('db.php'); // Include the database connection file
require_once('models/Item.php');
require_once('models/User.php');

class UpdateItemController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function update($requestData)
    {
        // Convert $requestData array to object
        $validatedData = (object) $requestData;

        // Define validation rules with custom message
        $validationRules = [
            'item_no' => ['required']
            // Add validation rules for other fields if needed
        ];

        // Custom error messages
        $errorMessages = [
            'item_no.required' => 'Item number is required.'
            // Add error messages for other fields if needed
        ];

        // Validate request data
        $validatedDataArray = (array) $validatedData;
        $validatedData = $this->validateRequest($validatedDataArray, $validationRules, $errorMessages);

        if (isset($validatedData['errors']) && !empty($validatedData['errors'])) {
            return ['errors' => $validatedData['errors']];
        }

        try {
            // Construct the SQL query string with placeholders
            $sql = "UPDATE items SET ";
            $params = [];
            foreach ($validatedData as $key => $value) {
                if ($key !== 'item_no') {
                    $sql .= "$key=?, ";
                    $params[] = $value;
                }
            }
            $sql = rtrim($sql, ", "); // Remove trailing comma and space
            $sql .= " WHERE item_no=?";

            // Prepare the SQL statement
            $stmt = $this->conn->prepare($sql);

            // Check if the statement was prepared successfully
            if (!$stmt) {
                throw new Exception("Failed to prepare statement");
            }

            // Bind parameters dynamically
            $types = str_repeat('s', count($params)) . 's'; // Assuming all parameters are strings
            $stmt->bind_param($types, ...$params, $validatedData['item_no']); // Add item_no to parameters

            // Execute the statement
            $success = $stmt->execute();

            // Close statement
            $stmt->close();

            if ($success) {
                // Return success message
                return ['success' => 'Item updated successfully'];
            } else {
                // Return error message
                return ['error' => 'Failed to update the item'];
            }

        } catch (\Exception $e) {
            // Log or handle the error as needed
            return ['error' => 'Failed to update the item: ' . $e->getMessage()];
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
$updateController = new UpdateItemController($connection); // Use $connection from db.php
$requestData = $_POST; // Assuming request data comes from POST
$response = $updateController->update($requestData);

// Output JSON response
header('Content-Type: application/json');
echo json_encode($response);
