<?php
include_once("../db_connect.php");

// Sanitize the POSTed search term
$searchTerm = $_POST['search'] ?? ''; // Using null coalescing operator

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT id, name, network_id, section FROM user_info WHERE name LIKE CONCAT('%', ?, '%') OR network_id LIKE CONCAT('%', ?, '%') OR section LIKE CONCAT('%', ?, '%')");
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['network_id']) . "</td>";
    // Consider removing or securely hashing passwords
    echo "<td>" . str_repeat('*', 8) . "</td>";
    echo "<td>" . htmlspecialchars($row['section']) . "</td>";
    if ($_SESSION['user_type'] == 1) {
        echo "<td><a href='user_edit.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Edit</a></td>";
    }
    echo "</tr>";
}
?>
