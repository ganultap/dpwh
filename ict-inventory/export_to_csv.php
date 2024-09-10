<?php
$data = json_decode($_GET['data'] ?? '[]', true);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="items_data.csv"');

$output = fopen('php://output', 'w');

if (!empty($data)) {
    // Output header row (if data is not empty)
    fputcsv($output, array_keys($data[0]));
}

foreach ($data as $row) {
    fputcsv($output, $row);
}

fclose($output);
?>
