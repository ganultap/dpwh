<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-longhashcode" crossorigin="anonymous" />
    
    <title>Admin Panel</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            /* background: linear-gradient(to right, rgba(247, 89, 41, 0.5), rgba(2, 5, 185, 0.5)); */
            background-color: 	#05014a;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Change height to min-height */
            display: flex;
            flex-direction: column;
            animation: fadeIn 0.6s ease-in-out;
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

        .welcome {
            text-align: right;
            background-color: <?php echo $background_color; ?>;
            color: white;
        }

        .welcome:hover {
            background-color:darkslategray;
            color: white;
        }
        .btn-dp-orange {
            background-color: #fc6b03;
            color: white;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .btn-dp-blue {
            background-color: #003DA5;
            color: white;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .btn-dp-blue:hover {
            background-color:darkslategray;
            color: white;
        }
        .btn-dp-orange:hover {
            background-color:darkslategray;
            color: white;
        }
        .btn {
            transition: box-shadow 0.3s ease-in-out; /* Add transition for smooth animation */
        }

        .btn:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add elevation effect on hover */
        }
        
    </style>
    
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <a class="navbar-brand" href="./">
                    <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="40" height="40" class="">
                    Admin Panel
                </a>
            </div>
            <div class="ml-auto" style="display: flex; justify-content: center;">
                <a class="welcome btn text-left"><?php echo $_SESSION['username']; ?></a>&nbsp; 
                <div class="btn-group">
                    <?php if ($showAddUserButton) : ?>
                        <a href="../users" class="btn btn-dp-orange">View Users</a>
                        <a href="../register" class="btn btn-dp-blue">Add User</a>
                    <?php endif; ?>
                </div>
                &nbsp;
                    <form method="post" action="./logout_confirmation.php" class="ml-auto">
                        <button type="submit" class="btn btn-dark">
                            Logout
                        </button>
                    </form>
            </div>

        </div>
    </nav>
