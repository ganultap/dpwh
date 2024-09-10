<!-- Printer Modal -->
<div class="modal fade" id="printerModal" tabindex="-1" aria-labelledby="printerModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-from-left">
        <div class="modal-content">
            <div class="modal-header bg-dp text-white">
                <h5 class="modal-title" id="printerModalLabel"><i class="bi bi-printer-fill text-danger"></i> Printers</h5>
                <!-- Search bar -->
                <div class="input-group" style="max-width: 400px; margin: 0 auto;">
                    <input type="text" class="form-control search" id="searchInputPrinter" placeholder="Search..." style="border-radius: 20px 0 0 20px;">
                    <button class="btn btn-outline-secondary" type="button" id="searchButtonPrinter" style="border-radius: 0 20px 20px 0;"><i class="bi bi-search"></i></button>
                </div>
                <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill"></i></button>
            </div>
            <div class="modal-body">


                <?php
                    // Fetch printer items
                    $printerItems = Item::viewPrinterItems();

                    // Check if printer items exist
                    if ($printerItems) {
                        // Output HTML table
                        echo '<table id="printerTable" class="table table-top-bottom-border table-wide p-0">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>IP Address</th>';
                        echo '<th>Serial No.</th>';
                        echo '<th>Inventory Item No.</th>';
                        echo '<th>Brand</th>';
                        echo '<th>Model</th>';
                        echo '<th style="text-align: right;">Unit Cost (&#8369;)</th>';
                        echo '<th>Section</th>';
                        echo '<th>Asset Owner</th>';
                        // Add other column headers as needed
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody id="printerTableBody">'; // Add an ID to tbody for easier manipulation
                        // Output printer items data
                        foreach ($printerItems as $item) {
                            echo '<tr>';
                            echo '<td>' . $item['computer_name'] . '</td>'; 
                            echo '<td>' . $item['serial_no'] . '</td>';
                            echo '<td>' . $item['inventory_item_no'] . '</td>';
                            echo '<td>' . $item['brand'] . '</td>';
                            echo '<td>' . $item['model'] . '</td>';
                            echo '<td style="text-align: right;">' . number_format($item['unit_cost'], 2) . '</td>';
                            echo '<td>' . $item['section'] . '</td>';
                            echo '<td>' . $item['asset_owner'] . '</td>';
                            // Add other column data as needed
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        // Output message if no printer items found
                        echo '<p>No Printer items found.</p>';
                    }
                ?>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to calculate and set modal width based on the number of columns
        function setModalWidthPrinter() {
            const numColumns = document.querySelectorAll('#printerTable thead th').length; // Get number of columns
            const columnWidth = 150; // Assuming a default width for each column
            const minWidth = 500; // Minimum width for the modal
            const padding = 30; // Padding for modal content
            const calculatedWidth = numColumns * columnWidth + padding; // Calculate modal width
            const modalWidth = calculatedWidth < minWidth ? minWidth : calculatedWidth; // Ensure minimum width
            document.querySelector('.modal-dialog').style.maxWidth = modalWidth + 'px'; // Set modal width
        }

        // Call the function when modal is shown
        $('#printerModal').on('shown.bs.modal', function(e) {
            setModalWidthPrinter();
        });

        // Function to perform search
        function performSearchPrinter() {
            const searchQuery = document.getElementById('searchInputPrinter').value.trim().toLowerCase();
            const tableRows = document.getElementById('printerTableBody').getElementsByTagName('tr');
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
            setModalWidthPrinter(); // Adjust modal width after search
        }

        // Add event listener to search input field for input event
        document.getElementById('searchInputPrinter').addEventListener('input', function() {
            performSearchPrinter(); // Call performSearch function on input event
        });

        // Add event listener to modal close event
        $('#printerModal').on('hide.bs.modal', function(e) {
            // Reset search input and other cleanup if needed
            document.getElementById('searchInputPrinter').value = '';
        });
    });
</script>