<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the necessary files
include_once("index_header.php");
include_once("nav.php");

$assetOwner = isset($_GET['owner']) ? $_GET['owner'] : '';
// Pagination setup
$perPage = 12;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$totalAssets = Item::countByAssetOwner($assetOwner);
$totalPages = ceil($totalAssets / $perPage);
$counter = ($currentPage - 1) * $perPage + 1; // Correctly set counter based on the current page

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$assets = Item::findByAssetOwnerWithSearch($assetOwner, $searchTerm, $currentPage, $perPage);


?>

<body>
<div class="col-10">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 py-4">
                    <div class="">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <!-- <span class="position-absolute top-0 start-99 translate-middle badge rounded-pill bg-info"><?= count($assets) ?></span> -->
                            <h5 class="mb-0">Assets for <?= htmlspecialchars($assetOwner) ?></h5>
                            <!-- <div class="search-container">
                                <input type="text" id="searchInput" class="form-control" onkeyup="filterAssets()" placeholder="Search assets...">
                            </div> -->
                            <form action="" method="get">
                                <input type="hidden" name="owner" value="<?= htmlspecialchars($assetOwner) ?>">
                                <div class="input-group">
                                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search assets...">
                                    <button type="submit" class="btn btn-secondary" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px;">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="">
                            <div class="">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Serial</th>
                                            <th>Equipment Type</th>
                                            <th>Description</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>End User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <!-- Add more columns as needed -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($assets as $asset): ?>
                                        <tr>
                                            <td><?= $counter ?></td> <!-- Now correctly continues counting across pages -->
                                            <td><?= htmlspecialchars($asset['serial_no']) ?></td>
                                            <td><?= htmlspecialchars($asset['equipment_type']) ?></td>
                                            <td><?= htmlspecialchars($asset['description']) ?></td>
                                            <td><?= htmlspecialchars($asset['brand']) ?></td>
                                            <td><?= htmlspecialchars($asset['model']) ?></td>
                                            <td><?= htmlspecialchars($asset['end_user']) ?></td>
                                            <td><?= htmlspecialchars($asset['status']) ?></td>
                                            <td>
                                                <a href="update/?item_no=<?= $asset['item_no'] ?>" target="_blank" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Full Details">
                                                    <i class="bi bi-zoom-in"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $counter++; // Increment counter after each row ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>                       
                            </div>                          
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <a class="btn btn-sm btn-secondary mt-2" href="asset_owners.php">Back</a>
                            </div>
                            <div class="col-7">
                                <?php if ($totalPages > 1): ?>
                                    <nav aria-label="Asset pagination" class="mt-2">
                                        <ul class="pagination">
                                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                            <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
                                            <a class="page-link" href="?owner=<?= htmlspecialchars($assetOwner) ?>&page=<?= $i ?>"><?= $i ?></a>
                                            </li>
                                            <?php endfor; ?>
                                        </ul>
                                    </nav>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-1"></div>
<script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

//  function filterAssets() {
//         let input = document.getElementById("searchInput");
//         let filter = input.value.toUpperCase();
//         let table = document.querySelector(".table");
//         let tbody = table.getElementsByTagName("tbody")[0]; // Target only the tbody for row filtering
//         let tr = tbody.getElementsByTagName("tr");

//         for (let i = 0; i < tr.length; i++) {
//             let tds = tr[i].getElementsByTagName("td");
//             let match = false;
//             for (let j = 0; j < tds.length; j++) {
//                 if (tds[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
//                     match = true;
//                     break;
//                 }
//             }
//             tr[i].style.display = match ? "" : "none";
//         }
//     }
</script>

</body>
</html>
