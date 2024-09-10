<?php
session_start();

// Function to end the session
function logout() {
    session_unset();
    session_destroy();
    header("Location: ../login");
    exit();
}

// Check if the logout button is clicked
if (isset($_POST['logout-btn'])) {
    logout();
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
    <link rel="icon" href="../dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-longhashcode" crossorigin="anonymous" />
    <title>Logout Confirmation</title>
    <style>
        body {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            background: linear-gradient(to right, rgba(247, 89, 41, 0.5), rgba(2, 5, 185, 0.5));
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .confirmation-box {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-logout {
            background-color: #e44d26;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn-logout:hover {
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="confirmation-box">
            <h3>Are you sure you want to logout?</h3>
            <form method="post">
                <button type="submit" name="logout-btn" class="btn btn-danger">Logout</button>
                <a href="./" class="btn btn-primary">Stay</a>
            </form>

        </div>
    </div>
</body>

</html>
