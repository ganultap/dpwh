<?php
session_start();

require_once '../db_connect.php';

function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_no = sanitize_input($_POST['item_no'] ?? '');
    $equipment_type_id = intval($_POST['equipment_type_id'] ?? 0);
    $sub_cat_id = intval($_POST['sub_cat_id'] ?? 0);
    $description_id = intval($_POST['description_id'] ?? 0);
    $supplier_id = intval($_POST['supplier_id'] ?? 0);
    $brand_id = intval($_POST['brand_id'] ?? 0);
    $model_name = sanitize_input($_POST['model_name'] ?? '');
    $unit_cost = floatval($_POST['unit_cost'] ?? 0.0);
    $quarter = intval($_POST['quarter'] ?? 0);
    $year = intval($_POST['year'] ?? 0);

    $errors = [];

    if (empty($item_no) || $equipment_type_id == 0 || $sub_cat_id == 0 || $description_id == 0 || $supplier_id == 0 || $brand_id == 0 || empty($model_name) || $unit_cost <= 0 || $quarter < 1 || $quarter > 4 || strlen($year) !== 4 || $year <= 0) {
        $errors[] = "All fields are required and must be valid.";
    }

    if (empty($errors)) {
        $insert_query = $conn->prepare("INSERT INTO market_survey_details (item_no, equipment_type_id, sub_cat_id, description_id, supplier_id, brand_id, model_name, unit_cost, quarter, year) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert_query->bind_param("iiiiisssii", $item_no, $equipment_type_id, $sub_cat_id, $description_id, $supplier_id, $brand_id, $model_name, $unit_cost, $quarter, $year);

        if ($insert_query->execute()) {
            $inserted_id = $insert_query->insert_id;
            $_SESSION['message'] = "Data inserted successfully. ID: $inserted_id";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error in inserting data: " . $insert_query->error;
            $_SESSION['message_type'] = "danger";
        }

        $insert_query->close();
    } else {
        $_SESSION['message'] = implode("<br>", $errors);
        $_SESSION['message_type'] = "danger";
    }
}

$conn->close();

header("Location: ms_add.php");
exit();
