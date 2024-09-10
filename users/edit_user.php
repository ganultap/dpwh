<?php
session_start();
include_once '../db_connect.php';

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

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
    <title>Edit User</title>
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

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 2px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        .disabled {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <h5>Edit Details</h5>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['update_message'])) :
                $update_message_type = $_SESSION['update_message_type'];
                $update_message = $_SESSION['update_message'];
            ?>
                <div class="alert alert-<?php echo $update_message_type; ?>" role="alert">
                    <?php echo $update_message; ?>
                </div>
                <?php
                unset($_SESSION['update_message']);
                unset($_SESSION['update_message_type']);
            endif;
            ?>
            <form action="edit_process.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                <input type="text" name="new_username" placeholder="new username" class="form-control" value="<?php echo htmlspecialchars($user_data['username']); ?>" readonly>
                <input type="password" name="current_password" placeholder="current password" class="form-control"
                    required>
                <input type="password" name="new_password" placeholder="new password" class="form-control" required>

                <label for="new_user_type">Select New User Type:</label>
                <select name="new_user_type" class="form-control" required>
                    <option value="1" <?php echo ($user_data['user_type'] == 1) ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo ($user_data['user_type'] == 2) ? 'selected' : ''; ?>>Moderator</option>
                    <option value="3" <?php echo ($user_data['user_type'] == 2) ? 'selected' : ''; ?>>User</option>
                </select>

                <br>

                <input type="submit" value="Update" class="btn btn-primary">
            </form>
            <a href="../users" class="mt-2">Back to Users</a>
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
