<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the necessary files
include_once("index_header.php");
include_once("nav.php");

// Assuming $connection is already created and available

$itemsPerPage = 14; // Define how many items you want per page

function getAssetOwnerCounts($connection, $page = 1, $itemsPerPage = 14) {
    // Calculate the offset
    $offset = ($page - 1) * $itemsPerPage;

    // SQL query to implement pagination
    $query = "SELECT asset_owner, COUNT(*) AS count FROM items GROUP BY asset_owner ORDER BY asset_owner LIMIT ? OFFSET ?";
    
    // Prepare statement to avoid SQL injection
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ii', $itemsPerPage, $offset); // 'ii' denotes that both parameters are integers
    $stmt->execute();
    $result = $stmt->get_result();
    
    $assetOwners = [];
    while ($row = $result->fetch_assoc()) {
        $assetOwners[] = $row;
    }
    $stmt->close();
    
    return $assetOwners;
}

function getTotalAssetOwners($connection) {
    $query = "SELECT COUNT(DISTINCT asset_owner) AS total FROM items";
    $result = $connection->query($query);
    if ($result !== false && $row = $result->fetch_assoc()) {
        return $row['total'];
    }
    return 0;
}

// Get current page from URL, default is page 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$totalAssetOwnersCount = getTotalAssetOwners($connection);
$totalPages = ceil($totalAssetOwnersCount / $itemsPerPage);
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// Fetch the data for current page
$assetOwners = getAssetOwnerCounts($connection, $page, $itemsPerPage);

function getAllAssetOwnerNames($connection) {
    $query = "SELECT DISTINCT asset_owner FROM items ORDER BY asset_owner";
    $result = $connection->query($query);
    $names = [];
    while ($row = $result->fetch_assoc()) {
        $names[] = $row['asset_owner'];
    }
    return $names;
}

// Fetch all names for search functionality
$allOwners = getAllAssetOwnerNames($connection);
$queryParams = $_GET;
?>

<script>
// Example JavaScript array populated with PHP for client-side search
var allAssetOwners = <?= json_encode($allOwners); ?>;
console.log(allAssetOwners); // For debugging, to see your asset owners in the browser console
</script>

<body class="bg-gray-50">
    <!-- Bootstrap Bundle with Popper -->
    <script src="../scripts/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> -->
    <!-- Custom JavaScript -->
    <div class="message-container">
        <?php if (isset($_GET['success'])): ?>
        <div class="message success-message">
            <?php echo $_GET['success']; ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
        <div class="message error-message">
            <?php echo $_GET['error']; ?>
        </div>
        <?php endif; ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var messages = document.querySelectorAll('.message');

            messages.forEach(function (message) {
                setTimeout(function () {
                    message.style.opacity = '0';
                }, 3000);
            });
        });
    </script>
<div class="col-10">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 py-4">
                    <div class="">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div></div>
                            <div></div>
                            <div class="input-group">
                                <input type="text" name="searchQuery" id="searchInput" class="form-control" style="width: 25px;" onkeyup="filterOwners()" placeholder="Search asset owners...">
                                <button type="submit" class="btn btn-secondary" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="">
                            <div class="scrollable">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                            Owners
                                                <i id="sortAlphaUp" class="bi bi-sort-alpha-down text-info fs-5" style="display: none;" onclick="sortOwnersAlpha()"></i>
                                                <i id="sortAlphaDown" class="bi bi-sort-alpha-up text-info fs-5" onclick="sortOwnersAlpha()"></i>
                                            </th>
                                            <th>
                                                Assets
                                                <i id="sortAsc" class="bi bi-sort-numeric-up text-info fs-5"  onclick="sortAssets('asc')"></i>
                                                <i id="sortDesc" class="bi bi-sort-numeric-down text-info fs-5" onclick="sortAssets('desc')"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="ownersBody">
                                        <?php foreach ($assetOwners as $owner): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($owner['asset_owner']) ?></td>
                                            <td>
                                            <a href="assets_list.php?owner=<?= urlencode($owner['asset_owner']) ?>" class="btn btn-sm btn-info" style="width: 40px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Show assets">
                                                <?= $owner['count'] ?>
                                            </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <nav aria-label="Asset pagination text-align-center" class="mt-2">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <?php
                                    // Update page parameter for each link
                                    $queryParams['page'] = $i;
                                    $pageLink = http_build_query($queryParams);
                                    ?>
                                    <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
                                        <a class="page-link" href="?<?= $pageLink ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-1"></div>

<script>

var allAssetOwners = <?= json_encode($allOwners) ?>;

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

function filterOwners() {
    const input = document.getElementById('searchInput');
    const filter = input.value;

    // Setup AJAX request
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'filterOwners.php?searchQuery=' + encodeURIComponent(filter), true);
    xhr.onload = function() {
        if (this.status === 200) {
            const tbody = document.getElementById('ownersBody');
            tbody.innerHTML = this.responseText; // Update table body with the response
        }
    };
    xhr.send();
}


function sortAssets(direction) {
    let rows, switching, i, x, y, shouldSwitch;
    const tbody = document.getElementById("ownersBody");
    switching = true;
    const sortAsc = document.getElementById("sortAsc");
    const sortDesc = document.getElementById("sortDesc");

    // Toggle icon visibility
    if (direction === 'asc') {
        sortAsc.style.display = "none";
        sortDesc.style.display = "inline";
    } else {
        sortAsc.style.display = "inline";
        sortDesc.style.display = "none";
    }


    // Make a loop that will continue until no switching has been done
    while (switching) {
        switching = false;
        rows = tbody.rows;

        // Loop through all table rows (except the first, which contains table headers)
        for (i = 0; i < (rows.length - 1); i++) {
            shouldSwitch = false;

            // Get the two elements you want to compare, one from current row and one from the next
            x = rows[i].getElementsByTagName("TD")[1];
            y = rows[i + 1].getElementsByTagName("TD")[1];

            // Check if the two rows should switch place, based on the direction
            if (direction === 'asc' && parseInt(x.textContent) > parseInt(y.textContent)) {
                shouldSwitch = true;
                break;
            } else if (direction === 'desc' && parseInt(x.textContent) < parseInt(y.textContent)) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            // If a switch has been marked, make the switch and mark that a switch has been done
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Your existing code to fade out messages...

    // Set the default sort direction
    document.getElementById("sortAsc").style.display = "none"; // Hide the ascending icon
    document.getElementById("sortDesc").style.display = "inline"; // Show the descending icon
});

function sortOwnersAlpha() {
    let rows, switching, i, x, y, shouldSwitch;
    const tbody = document.getElementById("ownersBody");
    switching = true;
    // Correct the IDs and use a single icon for toggling the sort order
    const sortAlphaUp = document.getElementById("sortAlphaUp");
    const sortAlphaDown = document.getElementById("sortAlphaDown");

    // Determine the current sort direction and toggle it
    let direction = sortAlphaUp.style.display === "none" ? 'asc' : 'desc';
    
    // Toggle icon visibility based on current direction
    if (direction === 'asc') {
        sortAlphaUp.style.display = "inline";
        sortAlphaDown.style.display = "none";
    } else {
        sortAlphaUp.style.display = "none";
        sortAlphaDown.style.display = "inline";
    }

    // Make a loop that will continue until no switching has been done
    while (switching) {
        switching = false;
        rows = tbody.rows;

        // Loop through all table rows (except the first, which contains table headers)
        for (i = 0; i < (rows.length - 1); i++) {
            shouldSwitch = false;

            // Get the two elements you want to compare, one from current row and one from the next
            x = rows[i].getElementsByTagName("TD")[0];
            y = rows[i + 1].getElementsByTagName("TD")[0];

            // Check if the two rows should switch place, based on the direction
            if ((direction === 'asc' && x.textContent.toLowerCase() > y.textContent.toLowerCase()) ||
                (direction === 'desc' && x.textContent.toLowerCase() < y.textContent.toLowerCase())) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            // If a switch has been marked, make the switch and mark that a switch has been done
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
    // Toggle the direction for the next call
    direction = direction === 'asc' ? 'desc' : 'asc';
}

</script>

</body>
</html>