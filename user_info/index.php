<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
}

include_once("../db_connect.php");

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
    // Add a new SQL query to fetch all data from user_info
    $userInfoSql = "SELECT * FROM user_info;";
    $userInfoResult = mysqli_query($conn, $userInfoSql);

    // Check if there is an error in the SQL query execution
    if (!$userInfoResult) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>User Info</title>

    <style>
        .table-responsive {
            min-height: 800px;
            max-height: 800px; /* or whatever fixed height you prefer */
            overflow-y: auto; /* Allows scrolling within the table */
        }

        body {
            
        }
    </style>

</head>

<body>
    <div class="container-fluid mt-4">
        <div class="card">
        <div class="card-header text-center">
                <h4>USER INFORMATION</h4>
            </div>
            <div class="search-bar form-group">
                <input type="text" id="search-input" class="form-control" placeholder="Type to search...">
            </div>
            <div class="table-responsive card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align: left;">Name</th>
                            <th>Network ID</th>
                            <th>Password</th> <!-- Consider the security implications of displaying passwords -->
                            <th>Section</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($userRow = mysqli_fetch_assoc($userInfoResult)) {
                            echo "<tr>";
                            echo "<td style='text-align: left;'>" . htmlspecialchars($userRow['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($userRow['network_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($userRow['password']) . "</td>"; // Consider omitting or masking passwords
                            echo "<td>" . htmlspecialchars($userRow['section']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('search-input');

    searchInput.addEventListener('keyup', function() {
        var filter = searchInput.value.toLowerCase();
        var tableBody = document.querySelector('.table tbody');
        var rows = tableBody.getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName('td');
            var rowText = '';
            for (var j = 0; j < cells.length; j++) {
                rowText += cells[j].textContent.toLowerCase() + " ";
            }

            if (rowText.indexOf(filter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    });
});
</script>
</body>
</html>
<?php
} else {
    header("Location: ../home");
    exit();
}
?>