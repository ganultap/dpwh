<?php
// Define your navigation items
$navItems = [
    ['file' => 'index.php', 'icon' => 'bi-speedometer', 'title' => 'Dashboard'],
    [
        'file' => 'asset_owners.php',
        'icon' => 'bi-people-fill',
        'title' => 'Asset Owners',
        // Optionally specify related files that should also activate this nav item
        'relatedFiles' => ['assets_list.php']
    ],
    // More items can be added here
];

$currentPage = basename($_SERVER['PHP_SELF']);

function isActiveNavItem($item, $currentPage) {
    if ($item['file'] === $currentPage) {
        return true;
    }
    if (!empty($item['relatedFiles']) && in_array($currentPage, $item['relatedFiles'])) {
        return true;
    }
    return false;
}
?>

<!-- Sidebar -->
<div class="row">
    <div class="col-1">
        <nav id="sidebarMenu" class="bg-black sidebar d-flex flex-column border-white" style="width: 60px; height: 100vh;">
            <ul class="nav flex-column flex-grow-1 mt-2">
                <?php foreach ($navItems as $item): ?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary <?= isActiveNavItem($item, $currentPage) ? 'active text-info' : ''; ?>" href="<?= $item['file']; ?>" data-bs-toggle="tooltip" title="<?= $item['title']; ?>">
                            <i class="<?= $item['icon']; ?> fs-3"></i>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>

<script>
// Initialize tooltips
document.addEventListener("DOMContentLoaded", function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
