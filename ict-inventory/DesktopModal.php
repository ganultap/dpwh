<!-- Desktop Modal -->
<div class="modal fade" id="desktopModal" tabindex="-1" aria-labelledby="desktopModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-from-left">
        <div class="modal-content">
            <div class="modal-header bg-dp text-white">
                <h5 class="modal-title" id="desktopModalLabel"><i class="bi bi-pc-display text-sm"></i> Desktop Computers</h5>
                <!-- Search bar -->
                <div class="input-group" style="max-width: 400px; margin: 0 auto;">
                    <input type="text" class="form-control search" id="searchInput" placeholder="Search..." style="border-radius: 20px 0 0 20px;">
                    <button class="btn btn-outline-secondary" type="button" id="searchButton" style="border-radius: 0 20px 20px 0;"><i class="bi bi-search"></i></button>
                </div>
                <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill"></i></button>
            </div>
            <div class="modal-body">

                <?php
                // Fetch desktop items
                $desktopItems = Item::viewDesktopItems();

                // Check if desktop items exist
                if ($desktopItems) {
                    // Output HTML table
                    echo '<table id="desktopTable" class="table table-top-bottom-border table-wide p-0">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Computer Name</th>';
                    echo '<th>Serial No.</th>';
                    echo '<th>Inventory Item No.</th>';
                    echo '<th>RAM</th>';
                    echo '<th>Disk Size</th>';
                    echo '<th>Brand</th>';
                    echo '<th>Model</th>';
                    echo '<th>Description</th>';
                    echo '<th style="text-align: right;">Unit Cost (&#8369;)</th>';
                    echo '<th>Section</th>';
                    echo '<th>Asset Owner</th>';
                    // Add other column headers as needed
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody id="desktopTableBody">'; // Add an ID to tbody for easier manipulation
                    // Output desktop items data
                    foreach ($desktopItems as $item) {
                        echo '<tr>';
                        echo '<td>' . $item['computer_name'] . '</td>'; 
                        echo '<td>' . $item['serial_no'] . '</td>';
                        echo '<td>' . $item['inventory_item_no'] . '</td>';
                        echo '<td>' . $item['ram'] . '</td>';
                        echo '<td>' . $item['disk_size'] . '</td>';
                        echo '<td>' . $item['brand'] . '</td>';
                        echo '<td>' . $item['model'] . '</td>';
                        echo '<td>' . $item['description'] . '</td>';
                        echo '<td style="text-align: right;">' . number_format($item['unit_cost'], 2) . '</td>';
                        echo '<td>' . $item['section'] . '</td>';
                        echo '<td>' . $item['asset_owner'] . '</td>';
                        // Add other column data as needed
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                } else {
                    // Output message if no desktop items found
                    echo '<p>No desktop items found.</p>';
                }
                ?>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to calculate and set modal width based on the number of columns
        function setModalWidth() {
            const numColumns = document.querySelectorAll('#desktopTable thead th').length; // Get number of columns
            const columnWidth = 150; // Assuming a default width for each column
            const minWidth = 500; // Minimum width for the modal
            const padding = 30; // Padding for modal content
            const calculatedWidth = numColumns * columnWidth + padding; // Calculate modal width
            const modalWidth = calculatedWidth < minWidth ? minWidth : calculatedWidth; // Ensure minimum width
            document.querySelector('.modal-dialog').style.maxWidth = modalWidth + 'px'; // Set modal width
        }

        // Call the function when modal is shown
        $('#desktopModal').on('shown.bs.modal', function(e) {
            setModalWidth();
        });

        // Function to perform search
        function performSearch() {
            const searchQuery = document.getElementById('searchInput').value.trim().toLowerCase();
            const tableRows = document.getElementById('desktopTableBody').getElementsByTagName('tr');
            // Loop through each row of the table
            for (let i = 0; i < tableRows.length; i++) {
                let rowVisible = false;
                const cells = tableRows[i].getElementsByTagName('td');
                // Loop through each cell in the row
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].innerText.toLowerCase();
                    // Check if the cell text contains the search query
                    if (cellText.includes(searchQuery)) {
                        rowVisible = true;
                        break; // No need to check other cells if one match is found
                    }
                }
                // Show/hide the row based on search result
                tableRows[i].style.display = rowVisible ? '' : 'none';
            }
            setModalWidth(); // Adjust modal width after search
        }

        // Add event listener to search input field for input event
        document.getElementById('searchInput').addEventListener('input', function() {
            performSearch(); // Call performSearch function on input event
        });

        // Add event listener to modal close event
        $('#desktopModal').on('hide.bs.modal', function(e) {
            // Reset search input
            document.getElementById('searchInput').value = '';
            // Show all table rows
            const tableRows = document.getElementById('desktopTableBody').getElementsByTagName('tr');
            for (let i = 0; i < tableRows.length; i++) {
                tableRows[i].style.display = ''; // Show the row
            }
            setModalWidth(); // Adjust modal width after resetting
        });

        // Prevent modal close on backdrop click
        $('#desktopModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
</script>
