<?php
include_once("../db_connect.php");

// Sanitize the POSTed search term
$searchTerm = $_POST['search'] ?? ''; // Using null coalescing operator

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, subject, description, status, created_at FROM tickets");
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
    echo "<td>" . htmlspecialchars($row['status']) . "</td>";

    echo "</tr>";
}
?>
