
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" data-bs-backdrop="static"
    data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dp text-white">
                <h5 class="modal-title" id="EditModalLabel"><i class="bi bi-pencil-square text-info"></i> Edit Item <?php echo $item['item_no']; ?></h5>
                <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing item -->
                <form id="editItemForm" action="EditItemController.php" method="POST">
                    <!-- Input fields for item attributes -->
                    <input type="hidden" id="editItemNo" name="editItemNo">
                    <div class="mb-3">
                        <label for="editComputerName" class="form-label">Computer Name</label>
                        <input type="text" class="form-control" id="editComputerName" name="editComputerName">
                    </div>
                    <div class="mb-3">
                        <label for="editEquipmentType" class="form-label">Equipment Type</label>
                        <input type="text" class="form-control" id="editEquipmentType" name="editEquipmentType">
                    </div>
                    <div class="mb-3">
                        <label for="editAcquisitionType" class="form-label">Acquisition Type</label>
                        <input type="text" class="form-control" id="editAcquisitionType" name="editAcquisitionType">
                    </div>
                    <div class="mb-3">
                        <label for="editProcessor" class="form-label">Processor</label>
                        <input type="text" class="form-control" id="editProcessor" name="editProcessor">
                    </div>
                    <div class="mb-3">
                        <label for="editRAM" class="form-label">RAM</label>
                        <input type="text" class="form-control" id="editRAM" name="editRAM">
                    </div>
                    <div class="mb-3">
                        <label for="editDiskSize" class="form-label">Disk Size</label>
                        <input type="text" class="form-control" id="editDiskSize" name="editDiskSize">
                    </div>
                    <div class="mb-3">
                        <label for="editLicensedOS" class="form-label">Licensed OS</label>
                        <input type="text" class="form-control" id="editLicensedOS" name="editLicensedOS">
                    </div>
                    <div class="mb-3">
                        <label for="editLicensedMSO" class="form-label">Licensed MSO</label>
                        <input type="text" class="form-control" id="editLicensedMSO" name="editLicensedMSO">
                    </div>
                    <div class="mb-3">
                        <label for="editOtherInstalledSoftware" class="form-label">Other Installed Software</label>
                        <input type="text" class="form-control" id="editOtherInstalledSoftware" name="editOtherInstalledSoftware">
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="editStatus" name="editStatus">
                    </div>
                    <div class="mb-3">
                        <label for="editAreParICS" class="form-label">Are Par ICS</label>
                        <input type="text" class="form-control" id="editAreParICS" name="editAreParICS">
                    </div>
                    <div class="mb-3">
                        <label for="editSerialNo" class="form-label">Serial No.</label>
                        <input type="text" class="form-control" id="editSerialNo" name="editSerialNo">
                    </div>
                    <div class="mb-3">
                        <label for="editInventoryItemNo" class="form-label">Inventory Item No.</label>
                        <input type="text" class="form-control" id="editInventoryItemNo" name="editInventoryItemNo">
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="editDescription" name="editDescription">
                    </div>
                    <div class="mb-3">
                        <label for="editModel" class="form-label">Model</label>
                        <input type="text" class="form-control" id="editModel" name="editModel">
                    </div>
                    <div class="mb-3">
                        <label for="editBrand" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="editBrand" name="editBrand">
                    </div>
                    <div class="mb-3">
                        <label for="editUnitCost" class="form-label">Unit Cost</label>
                        <input type="text" class="form-control" id="editUnitCost" name="editUnitCost">
                    </div>
                    <div class="mb-3">
                        <label for="editEndUser" class="form-label">End User</label>
                        <input type="text" class="form-control" id="editEndUser" name="editEndUser">
                    </div>
                    <div class="mb-3">
                        <label for="editDesignation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="editDesignation" name="editDesignation">
                    </div>
                    <div class="mb-3">
                        <label for="editSection" class="form-label">Section</label>
                        <input type="text" class="form-control" id="editSection" name="editSection">
                    </div>
                    <div class="mb-3">
                        <label for="editAssetOwner" class="form-label">Asset Owner</label>
                        <input type="text" class="form-control" id="editAssetOwner" name="editAssetOwner">
                    </div>
                    <div class="mb-3">
                        <label for="editDateReceived" class="form-label">Date Received</label>
                        <input type="text" class="form-control" id="editDateReceived" name="editDateReceived">
                    </div>
                    <div class="mb-3">
                        <label for="editReceivedFrom" class="form-label">Received From</label>
                        <input type="text" class="form-control" id="editReceivedFrom" name="editReceivedFrom">
                    </div>
                    <div class="mb-3">
                        <label for="editSupplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control" id="editSupplier" name="editSupplier">
                    </div>
                    <div class="mb-3">
                        <label for="editAcquisitionDate" class="form-label">Acquisition Date</label>
                        <input type="text" class="form-control" id="editAcquisitionDate" name="editAcquisitionDate">
                    </div>
                    <div class="mb-3">
                        <label for="editRemarks" class="form-label">Remarks</label>
                        <input type="text" class="form-control" id="editRemarks" name="editRemarks">
                    </div>

                    <!-- Submit button -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function populateEditModal(itemNo) {
    fetch('EditItemController.php?item_no=' + itemNo)
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch item data');
            }
            return response.json();
        })
        .then(data => {
            // Populate input fields with fetched data
            document.getElementById('editItemNo').value = data.item_no;
            document.getElementById('editComputerName').value = data.computer_name;
            document.getElementById('editEquipmentType').value = data.equipment_type;
            document.getElementById('editAcquisitionType').value = data.acquisition_type;
            document.getElementById('editProcessor').value = data.processor;
            document.getElementById('editRAM').value = data.ram;
            document.getElementById('editDiskSize').value = data.disk_size;
            document.getElementById('editLicensedOS').value = data.licensed_os;
            document.getElementById('editLicensedMSO').value = data.licensed_mso;
            document.getElementById('editOtherInstalledSoftware').value = data.other_installed_software;
            document.getElementById('editStatus').value = data.status;
            document.getElementById('editAreParICS').value = data.are_par_ics;
            document.getElementById('editSerialNo').value = data.serial_no;
            document.getElementById('editInventoryItemNo').value = data.inventory_item_no;
            document.getElementById('editDescription').value = data.description;
            document.getElementById('editModel').value = data.model;
            document.getElementById('editBrand').value = data.brand;
            document.getElementById('editUnitCost').value = data.unit_cost;
            document.getElementById('editEndUser').value = data.end_user;
            document.getElementById('editDesignation').value = data.designation;
            document.getElementById('editSection').value = data.section;
            document.getElementById('editAssetOwner').value = data.asset_owner;
            document.getElementById('editDateReceived').value = data.date_received;
            document.getElementById('editReceivedFrom').value = data.received_from;
            document.getElementById('editSupplier').value = data.supplier;
            document.getElementById('editAcquisitionDate').value = data.acquisition_date;
            document.getElementById('editRemarks').value = data.remarks;
        })
        .catch(error => console.error('Error fetching item data:', error));
}

    document.getElementById('EditModal').addEventListener('show.bs.modal', function (event) {
        var itemNo = event.relatedTarget.dataset.item_no;
        populateEditModal(itemNo);
    });

    // Adjusted event listener for the close button
    document.querySelector('#EditModal .btn-close').addEventListener('click', function(event) {
        $('#EditModal').modal('hide');
        $('#itemsModal').modal('hide');
    });

    document.getElementById('editItemForm').addEventListener('submit', function (event) {
        event.preventDefault();
        var formData = new FormData(this);

        fetch('EditItemController.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update item');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                console.log(data.message);
                // No need to hide modal here
            } else {
                console.error(data.message);
            }
        })
        .catch(error => console.error('Error updating item:', error));
    });
</script>
