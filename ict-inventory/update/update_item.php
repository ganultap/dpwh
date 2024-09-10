<?php
require_once '../db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['item_no']) && isset($_POST['computer_name']) && isset($_POST['description']) && isset($_POST['model']) && isset($_POST['brand']) && isset($_POST['unit_cost']) && isset($_POST['end_user']) && isset($_POST['designation']) && isset($_POST['section']) && isset($_POST['asset_owner']) && isset($_POST['date_received']) && isset($_POST['received_from']) && isset($_POST['supplier']) && isset($_POST['acquisition_date']) && isset($_POST['remarks']) && isset($_POST['equipment_type']) && isset($_POST['acquisition_type']) && isset($_POST['processor']) && isset($_POST['ram']) && isset($_POST['disk_size']) && isset($_POST['licensed_os']) && isset($_POST['licensed_mso']) && isset($_POST['other_installed_software']) && isset($_POST['status']) && isset($_POST['are_par_ics']) && isset($_POST['serial_no']) && isset($_POST['inventory_item_no'])) {
        // Sanitize input data
        $itemNo = $_POST['item_no'];
        $computerName = $_POST['computer_name'];
        $equipmentType = $_POST['equipment_type'];
        $acquisitionType = $_POST['acquisition_type'];
        $processor = $_POST['processor'];
        $ram = $_POST['ram'];
        $diskSize = $_POST['disk_size'];
        $licensedOs = $_POST['licensed_os'];
        $licensedMso = $_POST['licensed_mso'];
        $otherInstalledSoftware = $_POST['other_installed_software'];
        $status = $_POST['status'];
        $areParIcs = $_POST['are_par_ics'];
        $serialNo = $_POST['serial_no'];
        $inventoryItemNo = $_POST['inventory_item_no'];
        $description = $_POST['description'];
        $model = $_POST['model'];
        $brand = $_POST['brand'];
        $unitCost = $_POST['unit_cost'];
        $endUser = $_POST['end_user'];
        $designation = $_POST['designation'];
        $section = $_POST['section'];
        $assetOwner = $_POST['asset_owner'];
        $dateReceived = $_POST['date_received'];
        $receivedFrom = $_POST['received_from'];
        $supplier = $_POST['supplier'];
        $acquisitionDate = $_POST['acquisition_date'];
        $remarks = $_POST['remarks'];
   
        
        // Prepare SQL statement to update item
        $sql = "UPDATE items SET computer_name = '$computerName', equipment_type = '$equipmentType', acquisition_type = '$acquisitionType', processor = '$processor', ram = '$ram', disk_size = '$diskSize', licensed_os = '$licensedOs', licensed_mso = '$licensedMso', other_installed_software = '$otherInstalledSoftware', status = '$status', are_par_ics = '$areParIcs', serial_no = '$serialNo', inventory_item_no = '$inventoryItemNo', description = '$description', model = '$model', brand = '$brand', unit_cost = '$unitCost', end_user = '$endUser', designation = '$designation', section = '$section', asset_owner = '$assetOwner', date_received = '$dateReceived', received_from = '$receivedFrom', supplier = '$supplier', acquisition_date = '$acquisitionDate', remarks = '$remarks' WHERE item_no = '$itemNo'";
        
        // Execute the SQL statement
        if ($connection->query($sql) === TRUE) {
            // Redirect to the items list page or any other appropriate page after successful update
            header("Location: ./");
            exit();
        } else {
            // Handle SQL error
            echo "Error updating item: " . $connection->error;
        }
    } else {
        // Handle missing fields error
        echo "Missing fields error!";
    }
} else {
    // Handle invalid request method error
    echo "Invalid request method!";
}
?>
