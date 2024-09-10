// Fetch data from the server and populate table
document.addEventListener('DOMContentLoaded', () => {
    fetchAndPopulateTable();
});

function fetchAndPopulateTable() {
    fetch('data.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch data');
            }
            return response.json();
        })
        .then(data => {
            const tbody = document.getElementById('dataTable');
            tbody.innerHTML = '';
            data.forEach(row => {
                const tr = createTableRow(row);
                tbody.appendChild(tr);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function createTableRow(row) {
    const tr = document.createElement('tr');
    tr.id = row.id;
    Object.values(row).forEach(value => {
        const td = document.createElement('td');
        td.textContent = value;
        tr.appendChild(td);
    });
    const editBtn = createButton('Edit', 'btn-primary', () => editRow(row.id));
    const deleteBtn = createButton('Delete', 'btn-danger', () => deleteRow(row.id));
    tr.append(editBtn, deleteBtn);
    return tr;
}

function createButton(text, className, onClick) {
    const btn = document.createElement('button');
    btn.textContent = text;
    btn.classList.add('btn', className);
    btn.addEventListener('click', onClick);
    return btn;
}

// Edit and Delete functions
function editRow(id) {
    // Implement edit functionality
}

function deleteRow(id) {
    // Implement delete functionality
}

// Functions related to the EditModal
document.addEventListener("DOMContentLoaded", function() {
    $('#editForm').submit(event => {
        event.preventDefault();
        const editedItemData = $(event.target).serialize();
        saveChangesToServer(editedItemData);
    });

    $('#EditModal').on('show.bs.modal', function(event) {
        const button = $(event.relatedTarget);
        const itemData = button.data('item');
        populateEditItemModal(itemData);
    });

    $('#EditModal').on('hidden.bs.modal', function() {
        $('#editForm')[0].reset();
        $('#successMessage, #errorMessage').hide();
        $('.modal-backdrop').remove();
    });
});

// Function to open the edit modal
function openEditModal(itemId) {
    fetch(`getItem.php?id=${itemId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to retrieve item data');
            }
            return response.json();
        })
        .then(itemData => {
            populateEditItemModal(itemData);
            // Close any open modals before opening the edit modal
            $('#EditModal').modal('hide');
            $('#EditModal').modal('show');
        })
        .catch(error => {
            console.error('Error fetching item data:', error);
        });
}

// Handle modal dismissal events
$('#EditModal').on('hidden.bs.modal', function() {
    // Clear modal content
    $('#editForm')[0].reset();
    $('#successMessage, #errorMessage').hide();
    // Remove modal backdrop
    $('.modal-backdrop').remove();
});

// Function to populate edit item modal with item data
function populateEditItemModal(itemData) {
    // Set modal title using item data
    // Populate form fields with item data
    document.getElementById('editItemNo').value = itemData['item_no'];
    document.getElementById('editComputerName').value = itemData['computer_name'];
    document.getElementById('editEquipmentType').value = itemData['equipment_type'];
    document.getElementById('editAcquisitionType').value = itemData['acquisition_type'];
    document.getElementById('editProcessor').value = itemData['processor'];
    document.getElementById('editRam').value = itemData['ram'];
    document.getElementById('editDiskSize').value = itemData['disk_size'];
    document.getElementById('editLicensedOS').value = itemData['licensed_os'];
    document.getElementById('editLicensedMSO').value = itemData['licensed_mso'];
    document.getElementById('editOtherInstalledSoftware').value = itemData['other_installed_software'];
    document.getElementById('editStatus').value = itemData['status'];
    document.getElementById('editAreParIcs').value = itemData['are_par_ics'];
    document.getElementById('editSerialNo').value = itemData['serial_no'];
    document.getElementById('editInventoryItemNo').value = itemData['inventory_item_no'];
    document.getElementById('editDescription').value = itemData['description'];
    document.getElementById('editModel').value = itemData['model'];
    document.getElementById('editBrand').value = itemData['brand'];
    document.getElementById('editUnitCost').value = itemData['unit_cost'];
    document.getElementById('editEndUser').value = itemData['end_user'];
    document.getElementById('editDesignation').value = itemData['designation'];
    document.getElementById('editSection').value = itemData['section'];
    document.getElementById('editAssetOwner').value = itemData['asset_owner'];
    document.getElementById('editDateReceived').value = itemData['date_received'];
    document.getElementById('editReceivedFrom').value = itemData['received_from'];
    document.getElementById('editAcquisitionDate').value = itemData['acquisition_date'];
    document.getElementById('editSupplier').value = itemData['supplier'];
    document.getElementById('editRemarks').value = itemData['remarks'];
}

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
// Function to save changes
function saveChanges() {
    // Retrieve edited item data from form fields
    const editedItemData = {
        item_no: document.getElementById('editItemNo').value,
        computer_name: document.getElementById('editComputerName').value,
        equipment_type: document.getElementById('editEquipmentType').value,
        acquisition_type: document.getElementById('editAcquisitionType').value,
        processor: document.getElementById('editProcessor').value,
        ram: document.getElementById('editRam').value,
        disk_size: document.getElementById('editDiskSize').value,
        licensed_os: document.getElementById('editLicensedOS').value,
        licensed_mso: document.getElementById('editLicensedMSO').value,
        other_installed_software: document.getElementById('editOtherInstalledSoftware').value,
        status: document.getElementById('editStatus').value,
        are_par_ics: document.getElementById('editAreParIcs').value,
        serial_no: document.getElementById('editSerialNo').value,
        inventory_item_no: document.getElementById('editInventoryItemNo').value,
        description: document.getElementById('editDescription').value,
        model: document.getElementById('editModel').value,
        brand: document.getElementById('editBrand').value,
        unit_cost: document.getElementById('editUnitCost').value,
        end_user: document.getElementById('editEndUser').value,
        designation: document.getElementById('editDesignation').value,
        section: document.getElementById('editSection').value,
        asset_owner: document.getElementById('editAssetOwner').value,
        date_received: document.getElementById('editDateReceived').value,
        received_from: document.getElementById('editReceivedFrom').value,
        acquisition_date: document.getElementById('editAcquisitionDate').value,
        supplier: document.getElementById('editSupplier').value,
        remarks: document.getElementById('editRemarks').value,
    };

    // Implement logic to save changes (e.g., send data to server via AJAX)
    saveChangesToServer(editedItemData); // Implement this function to save changes

    // Close the modal after saving changes
    $('#EditModal').modal('hide');
    $('#itemsModal').modal('hide');
}


// Function to save changes to server (AJAX request)
function saveChangesToServer(itemData) {
    fetch('UpdateItemController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(itemData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            $('#successMessage').text(data.success).show();
            // Reload the main page after changes are saved successfully
            setTimeout(() => {
                window.location.reload();
            }, 1000); // Reload after 1 second (adjust time as needed)
        } else if (data.error) {
            $('#errorMessage').text(data.error).show();
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
}