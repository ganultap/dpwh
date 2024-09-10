<?Php 
require_once 'DashboardController.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return successful response for preflight request
    header("HTTP/1.1 200 OK");
    exit;
}
// Function to check if user is authenticated
function authCheck() {
    // Check if 'user' session variable is set
    return isset($_SESSION['username']);
}

$authCheck = authCheck();

// Initialize $userType variable
$userType = '';

// If user is authenticated, retrieve user type from session
if ($authCheck && isset($_SESSION['user_type'])) {
    $userType = $_SESSION['user_type'];
}

// Initialize $username variable
$username = '';

// If user is authenticated, retrieve username from session
if ($authCheck) {
    $username = $_SESSION['username'];
}

// Create an instance of DashboardController
$dashboardController = new DashboardController();
$data = $dashboardController->fetchData();
$pageTitle = "ICT Equipment Inventory Dashboard";

// $itemsData = Item::getItemCountByDateAcquired();
// $labels = array_column($itemsData, 'date');
// $dataPoints = array_column($itemsData, 'count');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/DPWH_Logo.png" type="image/x-icon">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tooltips.scss">
    <link rel="stylesheet" type="text/css" href="scripts/poppins.css">
    <link rel="stylesheet" href="scripts/all.min.css">
    <script src="scripts/chart.umd.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery-3.6.0.min"></script>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dp custom-sticky">
    <div class="container-fluid">
        <a class="navbar-brand" href="./"><img src="images/DPWH_Logo.png" alt="DPWH Logo" class="dpwh-logo"> <?php echo $pageTitle; ?></a>
        <!-- Authentication Links -->
        <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <!-- Loop through errors and display them -->
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        
        <div class="btn-group" id="menuTooltip" role="group" aria-label="User actions" data-bs-toggle="tooltip"
            data-bs-placement="left" title="User Profile">
            <?php if ($authCheck && ($userType == 1 || $userType == 2 || $userType == 3)): ?>
            <div class="dropdown w-50">
                <!-- Adjusted width to 50% here -->
                <!-- Use 'rounded-circle' to create a circular button -->
                <button
                    class="btn rounded-circle <?php echo ($_SESSION['user_type'] == 1) ? 'btn-danger' : (($_SESSION['user_type'] == 2) ? 'btn-success' : 'btn-primary'); ?> text-white"
                    type="button" id="userActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                    style="width: 50px; height: 50px;">
                    <i class="bi bi-person-fill text-center fs-4"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userActionsDropdown"
                    style="min-width: 150px;">
                    <!-- You may want to adjust this min-width as well depending on your needs -->
                    <!-- User info -->
                    <li
                        class="px-3 py-2 text-center disabled style="pointer-events: none;"">
                        <?php
                        $imagePath = "images/"; // Base path for the images
                        $userImage = ""; // Variable to hold the specific image filename
                        $user_type = "";

                        // Switch or conditional statement to set the correct image based on user_type
                        switch($_SESSION['user_type']) {
                            case 1:
                                $userImage = "1.png";
                                $user_type = "Administrator";
                                break;
                            case 2:
                                $userImage = "2.png";
                                $user_type = "Moderator";
                                break;
                            case 3:
                                $userImage = "3.png";
                                $user_type = "Basic User";
                                break;
                            default:
                                $userImage = "default.png"; // Default image if user_type is not 1, 2, or 3
                        }
                        ?>

                        <img src="<?php echo $imagePath . $userImage; ?>" alt="Avatar" class="rounded-circle mb-2" style="width: 80px; height: 80px;"> <br>
                        <?php echo $username; ?> <br>
                        <div class="text-white fs-6 p-1 <?php echo ($_SESSION['user_type'] == 1) ? 'bg-danger' : (($_SESSION['user_type'] == 2) ? 'bg-success' : 'bg-primary'); ?>" style="border-radius: 3px; font-size: 8"><?php echo $user_type; ?></div>
                    </li>
                    <!-- Actions -->
                    <!-- <li><a class="dropdown-item" href="manage-account.php">Manage Your Account</a></li> -->
                    <li>
                        <a href="#" class="dropdown-item text-center"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="LogoutController.php" method="POST" class="d-none">
                            <input type="hidden" name="_token" value="<?php echo $csrfToken; ?>">
                        </form>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
        </div>


        <?php if(!$authCheck): ?>
            <a class="text-right text-light text-decoration-none" href="login">Login</a>
        <?php endif; ?>
    </div>
            
    <label for="darkModeToggle" class="btn">
        <input class="form-check-input visually-hidden" type="checkbox" id="darkModeToggle">
        <i id="darkModeIcon" class="bi bi-lightbulb-fill text-light" data-bs-toggle="tooltip"
            data-bs-placement="bottom" title="Theme Switch"></i>
    </label>
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {
            const darkModeToggle = document.getElementById('darkModeToggle');
            const darkModeIcon = document.getElementById("darkModeIcon");

            // Set the initial state of the checkbox and the dark mode based on localStorage
            const isDarkMode = localStorage.getItem('darkMode') === 'true';
            darkModeToggle.checked = isDarkMode; // Set the checkbox state
            applyDarkMode(isDarkMode); // Apply the dark mode based on the saved preference

            darkModeToggle.addEventListener('change', function () {
                // Toggle dark mode and text color based on the checkbox state
                applyDarkMode(this.checked);
            });

            function applyDarkMode(enabled) {
                if (enabled) {
                    document.documentElement.dataset.bsTheme = 'dark';
                    document.body.classList.add('text-light');
                    document.body.classList.remove('text-dark'); // Ensure text is white
                    darkModeIcon.className = "bi bi-lightbulb-fill text-light"; // Dark mode icon
                    localStorage.setItem('darkMode', 'true');
                } else {
                    document.documentElement.dataset.bsTheme = 'light';
                    document.body.classList.add('text-dark'); // Ensure text is black
                    document.body.classList.remove('text-light');
                    darkModeIcon.className = "bi bi-lightbulb text-light"; // Light mode icon
                    localStorage.setItem('darkMode', 'false');
                }
            }
        });
    $(document).ready(function() {
        // Initialize tooltip for MenuTooltip
        $('#menuTooltip').tooltip();

        // Show tooltip on hover
        $('#menuTooltip').on('mouseenter', function() {
            $(this).tooltip('show');
        });

        // Hide tooltip when not hovered
        $('#menuTooltip').on('mouseleave', function() {
            $(this).tooltip('hide');
        });
    });

    $(document).ready(function() {
        // Prevent dropdown from closing when the specific li is clicked
        $('.disabled').click(function(event) {
            event.stopPropagation(); // Prevent click event from propagating to parent elements
        });
    });
    </script>
</nav>

        