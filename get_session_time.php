<?php
session_start();

// Calculate remaining session time
$remaining_time = 1800 - (time() - $_SESSION['last_activity']);
$minutes = floor($remaining_time / 60);
$seconds = $remaining_time % 60;

// Output remaining session time in format: minutes:seconds
echo "$minutes:$seconds";
?>
