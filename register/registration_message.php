<?php if ($registrationMessage && $registrationMessageType == 'success'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $registrationMessage ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
        // Delay redirection after 1 second
        setTimeout(function() {
            window.location.href = "../home";
        }, 2000);
    </script>
<?php endif; ?>
