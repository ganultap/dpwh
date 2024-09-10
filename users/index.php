<?php
session_start();

include_once '../db_connect.php';

// Check if the user is an admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
    $query = "SELECT * FROM users";
    $result = $conn->query($query);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-longhashcode" crossorigin="anonymous">
    <title>Registered Users</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            /* background: linear-gradient(to right, rgba(247, 89, 41, 0.5), rgba(2, 5, 185, 0.5)); */
            background-color: 	#05014a;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            animation: fadeIn 0.6s ease-in-out; /* Added fade-in animation */
            }
        @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

        .navbar {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .container {
            max-width: 80%;
            flex: 1;
        }

        .welcome-message {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

        .nav-cards {
            display: flex;
            gap: 20px;
        }

        .card-link {
            text-decoration: none;
            color: #333;
        }

        .card-link:hover {
            color: #e44d26;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            /* Dark background color for the footer */
            color: #ffffff;
            /* Text color for the footer */
            /* Padding for the footer content */
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .zoom {
            transition: transform 0.6s ease-in-out;
            position: relative;
            z-index: 1;
        }

        .zoom:hover {
            transform: scale(1.05);
            z-index: 2;
        }

        .logo img {
            transition: transform 0.6s ease-in-out;
        }

        .logo img:hover {
            transform: scale(1.2);
        }

        /* Style for the table */


        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: orange;
            color: black;

        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        /* Style for action buttons */
        .action-btns a {
            display: inline-block;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .action-btns a.btn-primary {
            background-color: #007bff;
            color: white;
        }

        .action-btns a.btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .action-btns a:hover {
            background-color: #e44d26;
        }
        .text-left {
            text-align: left;
        }
        .capitalize {
            text-transform: capitalize;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="container-fluid text-right mb-2">
            <a href="../home" class="btn btn-dark text-left">Back</a>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Registered Users</h5>
            </div>
        <div class="striped-table table-responsive card-body">
            <table class="table mt-4">
                <thead>
                    <tr class="capitalize">
                        <th>ID</th>
                        <th>USERNAME</th>
                        <th>USER TYPE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['user_type'] ?></td>
                        <td class="action-btns">
                            <div class="btn-group">
                                <a href='edit_user.php?id=<?= $row['id'] ?>' class='btn btn-info'>Edit</a>
                                <a href='delete_user.php?id=<?= $row['id'] ?>' class='btn btn-danger'>Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>

</html>

<?php
} else {
    header("Location: home.php");
    exit();
}
?>