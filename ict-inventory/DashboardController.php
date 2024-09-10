<?php

// Set maximum session timeout (in seconds)
$maxSessionTimeout = 3600; // 1 hour

// Begin the session
session_start();

// Include necessary models
require_once('db.php');
require_once('models/Item.php');
require_once('models/User.php');

// Check if the session variable for last activity time is set
if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $maxSessionTimeout)) {
    // If the session has expired, destroy the session and redirect the user to the login page
    session_unset();
    session_destroy();
    header("Location: ./"); // Redirect to the login page
    exit; // Prevent further execution
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Simulated authentication check
function isUserAuthenticated() {
    // Implement your own logic here to check if the user is authenticated
    return isset($_SESSION['username']);
}

// Simulated user type check
function getUserType() {
    // Implement your own logic here to get the user type
    return isset($_SESSION['username']) ? $_SESSION['username']['user_type'] : null;
}

// Simulated route function
function route($name) {
    // Implement your own logic here to generate URLs based on route names
    return "/$name";
}

// Simulated CSRF token
function csrf_field() {
    // Implement your own logic here to generate a CSRF token
    return "<input type=\"hidden\" name=\"_token\" value=\"your_csrf_token\">";
}

class DashboardController {
    public function fetchData() {
        // Set the page title
        $pageTitle = "ICT Equipment Inventory Dashboard";
        // Fetch counts
        $totalUsers = User::count();
        $totalAdmins = User::countByType(1);
        $totalModerators = User::countByType(2);
        $totalRegularUsers = User::countByType(3);
        $totalItems = Item::count();
        $totalDesktop = Item::countByEquipmentType('Desktop');
        $totalLaptop = Item::countByEquipmentType('Laptop');
        $totalPrinter = Item::countByEquipmentType('Printer - MFP') +
                        Item::countByEquipmentType('Printer - Wide Format') +
                        Item::countByEquipmentType('Printer - Single Function') +
                        Item::countByEquipmentType('Plotter');
        // $totalPlotter = Item::countByEquipmentType('Plotter');
        $totalipPhone = Item::countByEquipmentType('IP Phone');
        $totalSmartphone = Item::countByEquipmentType('Smartphone');
        $totalTablet = Item::countByEquipmentType('Tablet');
        $totalRepair = Item::countByStatus('For Repair');
        $totalOperational = Item::countByStatus('Operational');
        $totalUnserviceable = Item::countByStatus('Unserviceable');
        $totalProcured = Item::countByAcquisitionType('Procured');
        $totalContractor = Item::countByAcquisitionType('Turned over by contractor');
        $totalCentral = Item::countByAcquisitionType('Turned over by DPWH Central Office');
        $totalNA = Item::countByAcquisitionType('NONE');
        $totalRMU = Item::countBySection('RMU');
        $totalPDS = Item::countBySection('PDS');
        $totalCS = Item::countBySection('CS');
        $totalODE = Item::countBySection('ODE');
        $totalOADE = Item::countBySection('OADE');
        $totalHRAS = Item::countBySection('HRAS');
        $totalBAC = Item::countBySection('BAC');
        $totalMS = Item::countBySection('MS');
        $totalSPU = Item::countBySection('SPU');
        $totalQAS = Item::countBySection('QAS');
        $totalFS = Item::countBySection('FS');
        $totalICTS = Item::countBySection('ICTS');
        $totalLADP = Item::countBySection('LADP');
        $totalPS = Item::countBySection('PS');
        $totalCOA = Item::countBySection('COA');


        // Return data in an associative array
        $data = [
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalModerators' => $totalModerators,
            'totalRegularUsers' => $totalRegularUsers,
            'totalItems' => $totalItems,
            'totalDesktop' => $totalDesktop,
            'totalLaptop' => $totalLaptop,
            'totalPrinter' => $totalPrinter,
            'totalipPhone' => $totalipPhone,
            'totalSmartphone' => $totalSmartphone,
            'totalTablet' => $totalTablet,
            'totalRepair' => $totalRepair,
            'totalOperational' => $totalOperational,
            'totalUnserviceable' => $totalUnserviceable,
            'totalProcured' => $totalProcured,
            'totalContractor' => $totalContractor,
            'totalCentral' => $totalCentral,
            'totalNA' => $totalNA,
            'totalRMU' => $totalRMU,
            'totalPDS' => $totalPDS,
            'totalCS' => $totalCS,
            'totalODE' => $totalODE,
            'totalOADE' => $totalOADE,
            'totalHRAS' => $totalHRAS,
            'totalBAC' => $totalBAC,
            'totalMS' => $totalMS,
            'totalSPU' => $totalSPU,
            'totalQAS' => $totalQAS,
            'totalFS' => $totalFS,
            'totalICTS' => $totalICTS,
            'totalLADP' => $totalLADP,
            'totalPS' => $totalPS,
            'totalCOA' => $totalCOA
            // Add counts for other sections...
        ];

        return $data;
    }
}

// // Example usage:
// $dashboardController = new DashboardController();
// $data = $dashboardController->fetchData();
