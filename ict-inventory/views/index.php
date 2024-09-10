<?php
session_start();
require_once '../db.php';

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return successful response for preflight request
    header("HTTP/1.1 200 OK");
    exit;
}
// Function to check if user is authenticated
function authCheck() {
    // Check if 'user' session variable is set
    return isset($_SESSION['username']);
}

$authCheck = authCheck();

// Initialize $userType variable
$userType = '';

// If user is authenticated, retrieve user type from session
if ($authCheck && isset($_SESSION['user_type'])) {
    $userType = $_SESSION['user_type'];
}

// If user is authenticated, retrieve user type from database
if ($authCheck && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Fetch user_type from the users table
    $sql = "SELECT user_type FROM users WHERE username = '$username'";
    $result = $connection->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userType = $row['user_type'];
    } else {
        // Handle case where user data is not found in the database
        // For example, redirect to login page or display an error message
    }
}
// Check if the item_no is provided in the URL
if (isset($_GET['item_no'])) {
    $itemNo = $_GET['item_no'];

    // Fetch item details from the database based on the item_no
    $sql = "SELECT * FROM items WHERE item_no = '$itemNo'";
    $result = $connection->query($sql);

    // Check if the item exists
    if ($result && $result->num_rows > 0) {
        // Fetch the item details
        $item = $result->fetch_assoc();
    } else {
        // Redirect to a 404 page or display an error message
        header('Location: ./?error=Failed to update the item.');
        exit();
    }
} else {
    // Redirect to a 404 page or display an error message
    header('Location: ../?success=Items has been successfully updated.');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/DPWH_Logo.png" type="image/x-icon">
    <title>Item Information</title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/dist/js   /bootstrap.bundle.min.js">
    
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts - Poppins -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script> -->
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .card {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        margin: 20px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
        color: #333333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 16px;
        color: #666666;
        line-height: 1.6;
    }
    .card-footer {
        margin-top: 20px;
        display: flex;
        justify-content: flex-end; /* Align items to the right */
    }

    .btn-container {
        /* Optional: Add some spacing */
        margin-left: auto; /* Push the button to the right */
    }

</style>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="mt-2">Full Details</h4>
            </div>
            <div class="card-body">
            <form action="../update/?item_no=<?php $item['item_no']; ?>" method="POST">
            <input type="hidden" name="item_no" value="<?php echo $itemNo; ?>">
            <!-- Add input fields for item details -->
            <!-- Computer Name -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="computer_name" name="computer_name" placeholder="Computer Name" value="<?php echo isset($item['computer_name']) ? $item['computer_name'] : ''; ?>">
            <label for="computer_name" class="form-label">Computer Name</label>
        </div>
        <!-- Equipment Type -->
        <div class="col-4 mb-3 form-floating">  
            <input type="text" class="form-control" id="equipment_type" name="equipment_type" placeholder="Equipment Type" value="<?php echo isset($item['equipment_type']) ? $item['equipment_type'] : ''; ?>">
            <label for="equipment_type" class="form-label">Equipment Type</label>
        </div>
        
        <!-- Acquisition Type -->
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="acquisition_type" name="acquisition_type" placeholder="Acquisition Type" value="<?php echo isset($item['acquisition_type']) ? $item['acquisition_type'] : ''; ?>">
            <label for="acquisition_type" class="form-label">Acquisition Type</label>
        </div>
    </div>

    <!-- Processor, RAM, Disk Size -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="processor" name="processor" value="<?php echo isset($item['processor']) ? $item['processor'] : ''; ?>" placeholder="Processor">
            <label for="processor" class="form-label">Processor</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="ram" name="ram" value="<?php echo isset($item['ram']) ? $item['ram'] : ''; ?>" placeholder="RAM">
            <label for="ram" class="form-label">RAM</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="disk_size" name="disk_size" value="<?php echo isset($item['disk_size']) ? $item['disk_size'] : ''; ?>" placeholder="Disk Size">
            <label for="disk_size" class="form-label">Disk Size</label>
        </div>
    </div>

    <!-- Licensed OS, Licensed MSO -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="licensed_os" name="licensed_os" value="<?php echo isset($item['licensed_os']) ? $item['licensed_os'] : ''; ?>" placeholder="Licensed OS">
            <label for="licensed_os" class="form-label">Licensed OS</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="licensed_mso" name="licensed_mso" value="<?php echo isset($item['licensed_mso']) ? $item['licensed_mso'] : ''; ?>" placeholder="Licensed MSO">
            <label for="licensed_mso" class="form-label">Licensed MSO</label>
        </div>
        <!-- Other Installed Software -->
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="other_installed_software" name="other_installed_software" value="<?php echo isset($item['other_installed_software']) ? $item['other_installed_software'] : ''; ?>" placeholder="Other Installed Software">
            <label for="other_installed_software" class="form-label">Other Installed Software</label>
        </div>
    </div>
    <!-- Status, Are Par ICS, Serial No. -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="status" name="status" value="<?php echo isset($item['status']) ? $item['status'] : ''; ?>" placeholder="Status">
            <label for="status" class="form-label">Status</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="are_par_ics" name="are_par_ics" value="<?php echo isset($item['are_par_ics']) ? $item['are_par_ics'] : ''; ?>" placeholder="Are Par ICS">
            <label for="are_par_ics" class="form-label">Are Par ICS</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo isset($item['serial_no']) ? $item['serial_no'] : ''; ?>" placeholder="Serial No.">
            <label for="serial_no" class="form-label">Serial No.</label>
        </div>
    </div>

    <!-- Inventory Item No., Description, Model -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="inventory_item_no" name="inventory_item_no" value="<?php echo isset($item['inventory_item_no']) ? $item['inventory_item_no'] : ''; ?>" placeholder="Inventory Item No.">
            <label for="inventory_item_no" class="form-label">Inventory Item No.</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="description" name="description" value="<?php echo isset($item['description']) ? $item['description'] : ''; ?>" placeholder="Description">
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="model" name="model" value="<?php echo isset($item['model']) ? $item['model'] : ''; ?>" placeholder="Model">
            <label for="model" class="form-label">Model</label>
        </div>
    </div>

    <!-- Brand, Unit Cost, End User -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="brand" name="brand" value="<?php echo isset($item['brand']) ? $item['brand'] : ''; ?>" placeholder="Brand">
            <label for="brand" class="form-label">Brand</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="unit_cost" name="unit_cost" value="<?php echo isset($item['unit_cost']) ? $item['unit_cost'] : ''; ?>" placeholder="Unit Cost">
            <label for="unit_cost" class="form-label">Unit Cost</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="end_user" name="end_user" value="<?php echo isset($item['end_user']) ? $item['end_user'] : ''; ?>" placeholder="End User">
            <label for="end_user" class="form-label">End User</label>
        </div>
    </div>

    <!-- Designation, Section, Asset Owner -->
    <div class="row">
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="designation" name="designation" value="<?php echo isset($item['designation']) ? $item['designation'] : ''; ?>" placeholder="Designation">
            <label for="designation" class="form-label">Designation</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="section" name="section" value="<?php echo isset($item['section']) ? $item['section'] : ''; ?>" placeholder="Section">
            <label for="section" class="form-label">Section</label>
        </div>
        <div class="col-4 mb-3 form-floating">
            <input type="text" class="form-control" id="asset_owner" name="asset_owner" value="<?php echo isset($item['asset_owner']) ? $item['asset_owner'] : ''; ?>" placeholder="Asset Owner">
            <label for="asset_owner" class="form-label">Asset Owner</label>
        </div>
    </div>

    <!-- Date Received, Received From, Supplier, Acquisition Date -->
    <div class="row">
        <div class="col-3 mb-3 form-floating">
            <input type="text" class="form-control" id="date_received" name="date_received" value="<?php echo isset($item['date_received']) ? $item['date_received'] : ''; ?>" placeholder="Date Received">
            <label for="date_received" class="form-label">Date Received</label>
        </div>
        <div class="col-3 mb-3 form-floating">
            <input type="text" class="form-control" id="received_from" name="received_from" value="<?php echo isset($item['received_from']) ? $item['received_from'] : ''; ?>" placeholder="Received From">
            <label for="received_from" class="form-label">Received From</label>
        </div>
        <div class="col-3 mb-3 form-floating">
            <input type="text" class="form-control" id="supplier" name="supplier" value="<?php echo isset($item['supplier']) ? $item['supplier'] : ''; ?>" placeholder="Supplier">
            <label for="supplier" class="form-label">Supplier</label>
        </div>
        <div class="col-3 mb-3 form-floating">
            <input type="text" class="form-control" id="acquisition_date" name="acquisition_date" value="<?php echo isset($item['acquisition_date']) ? $item['acquisition_date'] : ''; ?>" placeholder="Acquisition Date">
            <label for="acquisition_date" class="form-label">Acquisition Date</label>
        </div>
    </div>

    <!-- Remarks -->
    <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo isset($item['remarks']) ? $item['remarks'] : ''; ?>" placeholder="Remarks">
        <label for="remarks" class="form-label">Remarks</label>
    </div>
            <?php if ($authCheck && ($userType == 1 || $userType == 2)): ?>
                <div class="btn-group">
                    <a class="btn btn-secondary" href="../"><i class="bi bi-x-square-fill"></i> Cancel</a> &nbsp;
                    <button type="submit" class="btn btn-primary"><i class="bi bi-bookmark-check-fill"></i> Update</button>
                </div>
            <?php endif; ?>
        </form>
            </div>
        </div>
        
    </div>
</body>
</html>
