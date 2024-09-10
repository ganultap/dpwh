<?php
include_once 'db.php';
// Fetch the search query from the URL parameter; default to an empty string if not set
$searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : '';

$htmlOutput = ''; // Initialize an empty string to hold the output HTML

if (!empty($searchQuery)) {
    // Prepare a SQL statement to prevent SQL injection
    // Using a LIKE query to find matching asset owners
    $searchTerm = "%" . $searchQuery . "%";
    $stmt = $connection->prepare("SELECT asset_owner, COUNT(*) AS count FROM items WHERE asset_owner LIKE ? GROUP BY asset_owner ORDER BY asset_owner");
    $stmt->bind_param("s", $searchTerm); // Bind the search term
    $stmt->execute();
    $result = $stmt->get_result();

    // Iterate over each matching row and append it to the HTML output
    while ($row = $result->fetch_assoc()) {
        $assetOwner = htmlspecialchars($row['asset_owner']);
        $count = $row['count'];
        $urlEncodedOwner = urlencode($row['asset_owner']);

        $htmlOutput .= "<tr>
                            <td>$assetOwner</td>
                            <td>
                                <a href='assets_list.php?owner=$urlEncodedOwner' class='btn btn-sm btn-info' style='width: 40px;' data-bs-toggle='tooltip' data-bs-placement='top' title='Show assets'>
                                    $count
                                </a>
                            </td>
                        </tr>";
    }

    $stmt->close();
}

// Echo the generated HTML back to the AJAX request
echo $htmlOutput;
?>
