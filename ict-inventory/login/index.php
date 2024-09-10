<?php
require_once("LoginController.php");


$sessionError = isset($_SESSION['error']) ? $_SESSION['error'] : '';

// If already logged in, redirect to another page
if(isset($_SESSION['username'])) {
    header("Location: ../"); // Goes back to dashboard.
    exit;
}

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
unset($_SESSION['errors']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="DPWH_Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/tailwindcss@^2.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
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


        .login-box input[type="text"],
        .login-box input[type="password"] {
            border: 1px solid #cbd5e0;
            border-radius: 5px;
            padding: 0.5rem;
            width: 100%;
            margin-bottom: 1rem;
            transition: border-color 0.3s ease;
        }

        .login-box input[type="text"]:focus,
        .login-box input[type="password"]:focus {
            border-color: #4a90e2;
        }

        .login-box button {
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .login-box button:hover {
            background-color: #357ae8;
        }

        .dpwh-logo {
            width: 50px;
            margin: 0 auto 1rem;
            display: block;
        }

        .login-box p {
            text-align: center;
            color: #6b7280;
            font-size: 0.75rem;
        }

        .login-box p a {
            color: #4a90e2;
            text-decoration: none;
            font-weight: bold;
        }

        .login-box p a:hover {
            text-decoration: underline;
        }

        .alert {
        position: relative;
        padding: 1rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        animation: fadeIn 0.5s ease; /* Apply animation */
        }

        .alert-success {
        color: #155724;
        background-color: #d4edda; /* Background color for success message */
        border-color: #c3e6cb; /* Border color for success message */
        font-size: 14px;
        text-align: center;
        }

        .alert-success .close-btn {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.75rem 1.25rem;
        color: inherit;
        background-color: green; /* Close button background color */
        border: none;
        }

        /* Error message container */
        .error-message {
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            border-radius: 0.25rem;
            animation: fadeInOut 0.5s ease;
            font-size: 14px;
            text-align: center;
        }

        /* Keyframes for fade in and out */
        @keyframes fadeInOut {
            0% { opacity: 0; }
            25% { opacity: 0.5; }
            50% { opacity: 0.75; }
            75% { opacity: 0.9; }
            100% { opacity: 1; }
        }

        .spinner-grow-sm {
            height: 1rem;
            width: 1rem;
            text-align: center;
        }
        .error-message {
            /* Your existing styles */
            transition: opacity 0.5s, transform 0.5s;
        }

        .slide-out {
            opacity: 0;
            transform: translateY(-50px); /* Adjust this value based on your design */
        }

    </style>
</head>
<body>
    <div class="login-box">
        <img src="DPWH_Logo.png" alt="DPWH Logo" class="dpwh-logo">
        <?php if (!empty($sessionError)): ?>
            <div id="sessionErrorMessage" class="error-message">
                <?php echo $sessionError; ?>
            </div>
        <?php endif; ?>
        <form id="loginForm" method="POST" action="LoginController.php">
            <div class="form-floating mb-2">
                <input
                    class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="username" name="username" placeholder="Username" type="text" required>
                    <label for="username">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input
                    class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    id="password" name="password" placeholder="Password" type="password" required>
                    <label for="password">Password</label>
            </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="justify-content-center" id="spinner" style="display:none;">
                        <div class="margin-auto text-center spinner-border text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="float-right">
                        <button id="loginButton" class="form-control bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Login
                        </button>
                    </div>
                </div>  
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            document.getElementById('loginButton').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
        });

       // Function to slide out the error messages after 5 seconds
    function slideOutMessages() {
        setTimeout(function () {
            var sessionErrorMessage = document.getElementById('sessionErrorMessage');
            if (sessionErrorMessage) {
                sessionErrorMessage.classList.add('slide-out');
                sessionErrorMessage.addEventListener('animationend', function() {
                    sessionErrorMessage.remove(); // Remove the element once the animation is complete
                    document.querySelector('.login-box').style.width = '300px'; // Restore the width of the login box
                });
            }
            var errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                errorMessage.classList.add('slide-out');
                errorMessage.addEventListener('animationend', function() {
                    errorMessage.remove(); // Remove the element once the animation is complete
                    document.querySelector('.login-box').style.width = '300px'; // Restore the width of the login box
                });
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    }

    </script>
</body>
</html>