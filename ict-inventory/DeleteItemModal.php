<!-- Modal -->
<div class="modal" id="deleteModal" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square-fill"></i></button>
      </div>
      <div class="modal-body">
        <p>Please enter your password to confirm deletion:</p>
        <input type="password" class="form-control" id="passwordInput">
        <input type="hidden" id="deleteItemNo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Confirm Deletion</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    // Function to open delete modal and set item number for deletion
    $('.delete-item-btn').click(function() {
        var itemNo = $(this).data('item-no');
        $('#deleteItemNo').val(itemNo);
        $('#deleteModal').modal('show');
    });

    // Confirm deletion
    $('#confirmDeleteBtn').click(function() {
        confirmDelete();
    });

    // Listen for "Enter" key press on the password input field
    $('#passwordInput').keyup(function(event) {
        if (event.keyCode === 13) { // "Enter" key code is 13
            confirmDelete();
        }
    });

    // Function to confirm deletion
    function confirmDelete() {
        var password = $('#passwordInput').val();
        var itemNo = $('#deleteItemNo').val();

        // Check if the password matches
        if (password === '0000') {
            // Proceed with deletion
            window.location.href = 'delete_item.php?item_no=' + itemNo;
        } else {
            // Incorrect password, handle accordingly (display error message, etc.)
            alert('Incorrect password. Please try again.');
            // Optionally clear the password field
            $('#passwordInput').val('');
        }
    }

// Navigate back to main page after closing deleteModal
$('#deleteModal').on('hidden.bs.modal', function (e) {
    window.location.href = './'; // Change 'main_page.php' to your actual main page URL
});
});
</script>
