<!-- Items Modal -->
<div class="modal fade" id="itemsModal" tabindex="-1" aria-labelledby="itemsModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-from-left">
        <div class="modal-content">
            <div class="modal-header bg-dp text-white">
                <h5 class="modal-title" id="itemsModalLabel"><i class="bi bi-box-seam text-info"></i> All Items</h5>
                <!-- Search bar -->
                <div class="input-group" style="max-width: 400px; margin: 0 auto;">
                    <input type="text" class="form-control search" id="searchInputItems" placeholder="Search..." style="border-radius: 20px 0 0 20px;">
                    <button class="btn btn-outline-secondary" type="button" id="searchButtonItems" style="border-radius: 0 20px 20px 0;"><i class="bi bi-search"></i></button>
                </div>
                <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill"></i></button>
            </div>
            <div class="modal-body">
                

                <?php
                    // Fetch item data (replace this with your data retrieval logic)
                    $itemsData = Item::viewItems();

                    // Check if item data exists
                    if ($itemsData) {
                        // Output HTML table
                        echo '<table id="itemsTable" class="table table-top-bottom-border table-wide p-0 table-hover">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Item No.</th>';
                        echo '<th>Computer Name</th>';
                        echo '<th>Equipment Type</th>';
                        echo '<th>Acquisition Type</th>';
                        echo '<th>Processor</th>';
                        echo '<th>RAM</th>';
                        echo '<th>Disk Size</th>';
                        echo '<th>Licensed OS</th>';
                        echo '<th>Licensed MSO</th>';
                        echo '<th>Other Installed Software</th>';
                        echo '<th>Status</th>';
                        echo '<th>Are Par ICS</th>';
                        echo '<th>Serial No.</th>';
                        echo '<th>Inventory Item No.</th>';
                        echo '<th>Description</th>';
                        echo '<th>Model</th>';
                        echo '<th>Brand</th>';
                        echo '<th style="text-align: right;">Unit Cost (&#8369;)</th>';
                        echo '<th>End User</th>';
                        echo '<th>Designation</th>';
                        echo '<th>Section</th>';
                        echo '<th>Asset Owner</th>';
                        echo '<th>Date Received</th>';
                        echo '<th>Received From</th>';
                        echo '<th>Supplier</th>';
                        echo '<th>Acquisition Date</th>';
                        echo '<th>Remarks</th>';
                        if ($userType == 1 || $userType == 2) {
                        echo '<th>Action</th>'; // Edit button column
                        }
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody id="itemsTableBody">'; // Add an ID to tbody for easier manipulation
                        // Output item data
                        foreach ($itemsData as $item) {
                            // echo '<tr class="clickable-row cursor-pointer" data-href="update?item_no=' . $item['item_no'] . '">';
                            echo '<tr>';
                            echo '<td>' . $item['item_no'] . '</td>';
                            echo '<td>' . $item['computer_name'] . '</td>'; 
                            echo '<td>' . $item['equipment_type'] . '</td>';
                            echo '<td>' . $item['acquisition_type'] . '</td>';
                            echo '<td>' . $item['processor'] . '</td>';
                            echo '<td>' . $item['ram'] . '</td>';
                            echo '<td>' . $item['disk_size'] . '</td>';
                            echo '<td>' . $item['licensed_os'] . '</td>';
                            echo '<td>' . $item['licensed_mso'] . '</td>';
                            echo '<td>' . $item['other_installed_software'] . '</td>';
                            echo '<td>' . $item['status'] . '</td>';
                            echo '<td>' . $item['are_par_ics'] . '</td>';
                            echo '<td>' . $item['serial_no'] . '</td>';
                            echo '<td>' . $item['inventory_item_no'] . '</td>';
                            echo '<td>' . $item['description'] . '</td>';
                            echo '<td>' . $item['model'] . '</td>';
                            echo '<td>' . $item['brand'] . '</td>';
                            echo '<td style="text-align: right;">' . number_format($item['unit_cost'], 2) . '</td>';
                            echo '<td>' . $item['end_user'] . '</td>';
                            echo '<td>' . $item['designation'] . '</td>';
                            echo '<td>' . $item['section'] . '</td>';
                            echo '<td>' . $item['asset_owner'] . '</td>';
                            echo '<td>' . date('m/d/Y', strtotime($item['date_received'])) . '</td>';
                            echo '<td>' . $item['received_from'] . '</td>';
                            echo '<td>' . $item['supplier'] . '</td>';
                            echo '<td>' . date('m/d/Y', strtotime($item['acquisition_date'])) . '</td>';
                            echo '<td>' . $item['remarks'] . '</td>';
                            // Pass $item data to editItem function
                            if ($userType == 1 || $userType == 2) {
                                echo '<td>';
                                echo '<div class="btn-group">';
                                echo '<a href="update?item_no=' . $item['item_no'] . '" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i></a>';
                                if ($userType == 1) {// Delete button
                                echo '<button type="button" class="btn btn-danger delete-item-btn" data-item-no="' . $item['item_no'] . '" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="bi bi-trash"></i>
                                </button>';
                                }
                                echo '</div>';
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        // Output message if no items found
                        echo '<p>No items found.</p>';
                    }
                    
                ?>
                
            </div>
            <!-- <div class="modal-footer">
                <button type="button" onclick="exportToPDF()" class="btn btn-primary">Export to PDF</button>
                <button type="button" onclick="exportToCSV()" class="btn btn-success">Export to Excel (CSV)</button>
            </div> -->
        </div>
    </div>
</div>


<?php 
  include_once'DeleteItemModal.php';
?>

<script>
    //Script for Table
    document.addEventListener("DOMContentLoaded", function() {
                // Function to handle row click
                $(document).ready(function() {
                    $(".clickable-row").click(function() {
                        window.location = $(this).data("href");
                    });
                });
        // Function to perform search
        function performSearchItems() {
            const searchQuery = document.getElementById('searchInputItems').value.trim().toLowerCase();
            const tableRows = document.getElementById('itemsTableBody').getElementsByTagName('tr');
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
        }

        // Add event listener to search input field for input event
        document.getElementById('searchInputItems').addEventListener('input', function() {
            performSearchItems(); // Call performSearch function on input event
        });

        // Add event listener for edit buttons
        document.querySelectorAll('.btn-edit-item').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-item_no');
                editItem(itemId); // Fix: Pass itemId to editItem function
            });
        });

        // Stop propagation for delete button inside a clickable row
            $('.delete-item-btn').on('click', function(event) {
                event.stopPropagation(); // This stops the event from bubbling up to the parent row

                var itemNo = $(this).data('item-no');
                // Set the item number in your delete modal or handle it however you need
                $('#deleteItemNo').val(itemNo);
                $('#deleteModal').modal('show');
            });
        // Add event listener to highlight selected row
        document.querySelectorAll('#itemsTableBody tr').forEach(row => {
            row.addEventListener('click', function() {
                // Remove highlight from all rows
                document.querySelectorAll('#itemsTableBody tr').forEach(row => {
                    row.classList.remove('highlighted-row');
                });
                // Highlight the clicked row
                this.classList.add('highlighted-row');
            });
        });
    });

    // Function to handle edit item action
    function editItem(item_no) {
            // Add your edit item functionality here
            alert('Edit item with ID: ' + item_no);
        }

        // Function to handle delete item action
        function deleteItem(itemId) {
            // Add your delete item functionality here
            alert('Delete item with ID: ' + itemId);
        }

        function exportToPDF() {
        var tableData = getTableData();
        // Use AJAX to send data to a PHP script that generates PDF
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'export_to_pdf.php', true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.responseType = 'blob'; // Expect a PDF file back

        xhr.onload = function () {
            if (this.status === 200) {
                var blob = new Blob([this.response], { type: 'application/pdf' });
                var downloadUrl = URL.createObjectURL(blob);
                var a = document.createElement("a");
                a.href = downloadUrl;
                a.download = "items_data.pdf";
                document.body.appendChild(a);
                a.click();
            } else {
                alert('Error exporting PDF');
            }
        };

        xhr.send(JSON.stringify({data: tableData}));
    }

    function exportToCSV() {
        var tableData = getTableData();
        // Similar to PDF, but for simplicity, you can submit this as a form or redirect
        window.location.href = 'export_to_csv.php?data=' + encodeURIComponent(JSON.stringify(tableData));
    }

    function getTableData() {
        var data = [];
        var headers = [];
        document.querySelectorAll('#itemsModal thead th').forEach(function(header) {
            headers.push(header.innerText);
        });
        document.querySelectorAll('#itemsModal tbody tr').forEach(function(row) {
            var rowData = {};
            row.querySelectorAll('td').forEach(function(cell, index) {
                rowData[headers[index]] = cell.innerText;
            });
            data.push(rowData);
        });
        return data;
    }
</script>
