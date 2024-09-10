<?php
// Check if the username and password are provided and correct
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== 'patlunagrl' || $_SERVER['PHP_AUTH_PW'] !== 'Dpwh2022') {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required.';
    exit;
}

// Proceed with file upload if authentication is successful
if ($_FILES && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '/volume1/web/dpwh-bcdeo/images/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        echo "File is uploaded successfully.";
    } else {
        echo "Upload failed.";
    }
}
?>
