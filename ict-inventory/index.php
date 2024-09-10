<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the necessary files
include_once("index_header.php");
include_once("nav.php");

// Determine which page to display
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

switch ($page) {
    case 'asset_owners':
        include_once('asset_owners.php');
        break;
    case 'dashboard':
    default:
        include_once('dashboard.php');
        break;
}

?>
