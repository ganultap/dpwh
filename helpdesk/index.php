<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk System</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Helpdesk System</h1>
        <a href="create_ticket.php" class="btn btn-primary mb-3">Create New Ticket</a> <br>
        <a href="view_ticket.php" class="btn btn-primary mb-3">View Ticket</a> <br>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tickets";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['subject']}</td>
                                <td>{$row['status']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='view_ticket.php?id={$row['id']}' class='btn btn-info'>View</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No tickets found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
