<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ticket Details</h1>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tickets WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<p><strong>Subject:</strong> {$row['subject']}</p>";
            echo "<p><strong>Description:</strong> {$row['description']}</p>";
            echo "<p><strong>Status:</strong> {$row['status']}</p>";
            echo "<p><strong>Created At:</strong> {$row['created_at']}</p>";
            echo "<a href='index.php' class='btn btn-primary'>Back to List</a>";
        } else {
            echo "<p class='text-danger'>Ticket not found</p>";
        }
        ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
