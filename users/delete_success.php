<?php
session_start();
include_once '../db_connect.php';

// Check if the user is an admin
if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Get user data to display information
        $get_user_query = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $get_user_query->bind_param("i", $id);
        $get_user_query->execute();
        $user_result = $get_user_query->get_result();

        if ($user_result->num_rows > 0) {
            $user_data = $user_result->fetch_assoc();
        } else {
            $_SESSION['message'] = "User not found.";
            $_SESSION['message_type'] = "danger";
            header("Location: ../users");
            exit();
        }
    } else {
        $_SESSION['message'] = "User ID not provided.";
        $_SESSION['message_type'] = "danger";
        header("Location: ../users");
        exit();
    }

    // Check if the delete button is clicked
    if (isset($_POST['delete-btn'])) {
        $delete_user_query = $conn->prepare("DELETE FROM users WHERE id = ?");
        $delete_user_query->bind_param("i", $id);
        $delete_user_query->execute();

        $_SESSION['message'] = "User deleted successfully!";
        $_SESSION['message_type'] = "success";
        header("Location: delete_success.php");
        exit();
    }
} else {
    header("Location: ../home");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" href="../dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-longhashcode" crossorigin="anonymous">
    <title>Delete User</title>
    <style>
        body {
            text-align: center;
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
        }

        .container {
            width: 80%;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            border-radius: 8px;
            background-color: #007bff;
            color: white;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .alert {
            margin-top: 20px;
        }

        label {
            text-align: left;
            margin-bottom: 5px;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            cursor: pointer;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <p class="text-center">The username "<?php echo htmlspecialchars($user_data['username']); ?>" was successfully deleted.</p>
        <p class="text-center"><a href="../users">Back to Users</a></p>
    </div>
</body>

</html>
