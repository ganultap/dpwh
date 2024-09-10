<?php
header('Content-Type: application/pdf');
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'tcpdf/tcpdf.php'; // Ensure this points to the correct location of TCPDF

// Assuming $data is already populated with your table's data
// If $data is passed via POST, uncomment the line below
// $data = json_decode(file_get_contents('php://input'), true)['data'] ?? [];

// Create new PDF document
// Use 'L' for landscape orientation, and specify custom size in millimeters
$pdf = new TCPDF('L', PDF_UNIT, array(215.9, 330.2), true, 'UTF-8', false);

// Document's meta-information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Items Export');
$pdf->SetSubject('Exported Items Table');
$pdf->SetKeywords('TCPDF, PDF, example, items, export');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('dejavusans', '', 10);

// Construct the HTML for the table
$tableHTML = '<table border="1" cellpadding="4">';
// Header row
$tableHTML .= '<tr>';
foreach ($data[0] as $header => $value) {
    $tableHTML .= '<th>' . $header . '</th>';
}
$tableHTML .= '</tr>';

// Data rows
foreach ($data as $row) {
    $tableHTML .= '<tr>';
    foreach ($row as $cell) {
        $tableHTML .= '<td>' . $cell . '</td>';
    }
    $tableHTML .= '</tr>';
}
$tableHTML .= '</table>';

// Print the table
$pdf->writeHTML($tableHTML, true, false, true, false, '');

// Close and output PDF document
// This method has several options, check the TCPDF documentation for more information.
if (ob_get_contents()) ob_end_clean();
$pdf->Output('items_export.pdf', 'I');
?>
