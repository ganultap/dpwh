<?php
$file = "volume1/web/admin/";

if (file_exists($file)) {
    // File exists, do something with it
    // For example, display the file
    echo file_get_contents($file);
} else {
    // File doesn't exist, redirect to index.php
    header("Location: index.php");
    exit; // Ensure that script execution stops after redirection
}

