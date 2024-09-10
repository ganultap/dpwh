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
        header("Location: delete_success.php"); // Redirect to delete_success.php
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
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
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
            animation: fadeIn 1s ease-in-out; /* Added fade-in animation */
            }
        @keyframes fadeIn {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
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
    <div class="card">
        <div class="card-header">
            <h5>Delete <?php echo htmlspecialchars($user_data['username']); ?></h5>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['message'])) :
                $message_type = $_SESSION['message_type'];
                $message = $_SESSION['message'];
            ?>
                <div class="alert alert-<?php echo $message_type; ?>" role="alert">
                    <?php echo $message; ?>
                </div>
                <?php
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            endif;
            ?>
            <form action="delete_user.php?id=<?php echo $id; ?>" method="post">
                <label for="confirmation">Are you sure you want to delete this user?</label>
                <div>
                    <button href="delete_success.php" type="submit" name="delete-btn" class="btn btn-danger">Yes, Delete</button>
                    <a href="../users" class="btn btn-primary">No, Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
