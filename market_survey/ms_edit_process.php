<?php
session_start();

// Include the database connection file
require_once '../db_connect.php';

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Retrieve form data
$id = sanitize_input($_POST['id']);
$item_no = sanitize_input($_POST['item_no']);
$quarter = sanitize_input($_POST['quarter']);
$year = sanitize_input($_POST['year']);
$unit_cost = sanitize_input($_POST['unit_cost']);
$equipment_type_id = sanitize_input($_POST['equipment_type_id']);
$sub_cat_id = sanitize_input($_POST['sub_cat_id']);
$description_id = sanitize_input($_POST['description_id']);
$supplier_id = sanitize_input($_POST['supplier_id']);
$brand_id = sanitize_input($_POST['brand_id']);
$model_name = sanitize_input($_POST['model_name']);

// Update item details in the database
$stmt = $conn->prepare("UPDATE market_survey_details SET item_no=?, quarter=?, year=?, unit_cost=?, equipment_type_id=?, sub_cat_id=?, description_id=?, supplier_id=?, brand_id=?, model_name=? WHERE id=?");
$stmt->bind_param("ssssssssssi", $item_no, $quarter, $year, $unit_cost, $equipment_type_id, $sub_cat_id, $description_id, $supplier_id, $brand_id, $model_name, $id);

if ($stmt->execute()) {
    $_SESSION['message'] = "Item details updated successfully.";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "Failed to update item details.";
    $_SESSION['message_type'] = "danger";
}

$stmt->close();
$conn->close();

header("Location: ../market_survey");
exit();
