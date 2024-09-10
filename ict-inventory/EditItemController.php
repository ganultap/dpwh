<?php
// Ensure that the request is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405); // Method Not Allowed
    exit(json_encode(['success' => false, 'message' => 'Invalid request method']));
}

// Include necessary files
require_once('db.php'); // Include the database connection file

// Check if all required fields are present
$requiredFields = ['editItemNo', 'editComputerName', 'editEquipmentType', 'editAcquisitionType', 'editProcessor', 'editRAM', 'editDiskSize', 'editLicensedOS', 'editLicensedMSO', 'editOtherInstalledSoftware', 'editStatus', 'editAreParICS', 'editSerialNo', 'editInventoryItemNo', 'editDescription', 'editModel', 'editBrand', 'editUnitCost', 'editEndUser', 'editDesignation', 'editSection', 'editAssetOwner', 'editDateReceived', 'editReceivedFrom', 'editSupplier', 'editAcquisitionDate', 'editRemarks'];

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        http_response_code(400); // Bad Request
        exit(json_encode(['success' => false, 'message' => 'Missing or empty required field: ' . $field]));
    }
}

try {
    // Prepare SQL statement
    $sql = "UPDATE items SET 
        computer_name = :computerName, 
        equipment_type = :equipmentType, 
        acquisition_type = :acquisitionType, 
        processor = :processor, 
        ram = :ram, 
        disk_size = :diskSize, 
        licensed_os = :licensedOS, 
        licensed_mso = :licensedMSO, 
        other_installed_software = :otherInstalledSoftware, 
        status = :status, 
        are_par_ics = :areParICS, 
        serial_no = :serialNo, 
        inventory_item_no = :inventoryItemNo, 
        description = :description, 
        model = :model, 
        brand = :brand, 
        unit_cost = :unitCost, 
        end_user = :endUser, 
        designation = :designation, 
        section = :section, 
        asset_owner = :assetOwner, 
        date_received = :dateReceived, 
        received_from = :receivedFrom, 
        supplier = :supplier, 
        acquisition_date = :acquisitionDate, 
        remarks = :remarks
        WHERE item_no = :itemNo";

    // Prepare statement
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $params = [
        ':computerName' => $_POST['editComputerName'],
        ':equipmentType' => $_POST['editEquipmentType'],
        // Bind other parameters...
    ];
    // Bind other parameters...

    // Execute statement
    $stmt->execute($params);

    // Return success response
    exit(json_encode(['success' => true, 'message' => 'Item updated successfully']));
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    exit(json_encode(['success' => false, 'message' => 'Error updating item: ' . $e->getMessage()]));
} finally {
    // Close statement
    unset($stmt);
}
