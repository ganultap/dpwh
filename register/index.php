<?php
session_start();

// Include the database connection file
include_once '../db_connect.php';

// Check if the user is an admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <title>Add User</title>

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
            align-items: center;
            justify-content: center;
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

        .card {
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Added box shadow */
        }

        .card-header h2 {
            margin: 0;
            color: #333;
        }


        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        .form-control {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header text-center">
            <img src="../images/dpwh_logo.png" alt="DPWH Logo" style="width:40px; height:40px;" class="text-center">
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['message'])) {
                $messageType = ($_SESSION['message_type'] == 'success') ? 'alert-success' : 'alert-danger';
                echo "<div class='alert $messageType' role='alert'>{$_SESSION['message']}</div>";
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            }
            ?>

            <form id="registerForm" action="register_process.php" method="post">
                <input type="text" name="username" placeholder="Username" class="form-control" required>
                <input type="password" name="password" placeholder="Password" class="form-control" required>

                <label for="user_type">SELECT USERTYPE</label>
                <select name="user_type" class="form-control" required>
                    <option value="1">Admin</option>
                    <option value="2">Moderator</option>
                    <option value="3">User</option>
                </select>

                <br>

                <input type="submit" value="Register" class="btn btn-primary">

            </form>
            <div class="text-center">
                <a href="../home" class="mt-4">Back</a>
            </div>
        </div>
    </div>

</body>

</html>

<?php
} else {
    header("Location: ../home");
    exit();
}
?>
