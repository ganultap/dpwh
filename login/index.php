<?php
session_start();

include_once '../db_connect.php';

if (isset($_SESSION['username'])) {
    header("Location: ../home");
    exit();
}

$errorMessages = [
    1 => "Invalid password!",
    2 => "User not found!",
    "default" => ""
];

$error = isset($_GET['error']) ? $_GET['error'] : 0;
$errorMessage = $errorMessages[$error] ?? $errorMessages['default'];

$registrationMessage = $_SESSION['message'] ?? '';
$registrationMessageType = $_SESSION['message_type'] ?? '';

unset($_SESSION['message'], $_SESSION['message_type']);
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
    <title>Login</title>
    <style>
        body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: 'Poppins', sans-serif;
                font-size: 14px;
                background-image: linear-gradient(to bottom right, #05014a, #ff4d01);
        }
        .dp-orange {
            background-color: #fc6b03;
            color: white;
        }
        .dp-blue {
            background-color: #003DA5;
            color: white;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .login-box {
                background-color: rgba(255, 255, 255, 0.9); /* Increase transparency for a subtle effect */
                border-radius: 20px; /* Increase border radius for a more elegant appearance */
                box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Add a subtle box-shadow */
                padding: 2rem;
                width: 300px;
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Add transition for hover effect */
            }

            .login-box:hover {
                box-shadow: 0px 0px 20px rgba(74, 144, 226, 0.8); /* Change the box-shadow to make it glow */
            }
    </style>
    <script src="script.js"></script>
</head>

<body>
    <div class="card login-box">
        <div class="text-center ">
                    <img class="text-center" src="../images/dpwh_logo.png" alt="DPWH Logo" style="width:40px; height:40px;" class="">
        </div>
        <div class="card-body">
            <?php include '../error_messages.php'; ?>
            <?php include 'login_form.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8J+Lw1MHShb0YHA+Px4E9fXTf8+gN1b8cvrWOF/pfLHpPbYU2U2I9lKKtWA"
        crossorigin="anonymous"></script>
</body>

</html>
