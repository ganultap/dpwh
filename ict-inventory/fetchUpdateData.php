<?php 
require_once 'DashboardController.php';
if (isset($_GET['action']) && $_GET['action'] === 'fetchUpdatedData') {
    // Include necessary files and perform database queries to fetch updated data
    require_once 'DashboardController.php';

    // Fetch updated data here...

    // Prepare the updated data to send back as JSON
    $updatedData = [
        'totalItems' => $totalItems,
            'totalDesktop' => $totalDesktop,
            'totalLaptop' => $totalLaptop,
            'totalPrinter' => $totalPrinter,
            'totalPlotter' => $totalPlotter,
            'totalipPhone' => $totalipPhone,
            'totalSmartphone' => $totalSmartphone,
            'totalTablet' => $totalTablet,
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
            'totalPS' => $totalPS,
            'totalCOA' => $totalCOA,
    ];

    // Send the updated data as JSON response
    header('Content-Type: application/json');
    echo json_encode($updatedData);
    exit; // Stop further execution
}
