<?php

include_once 'home_process.php';
include_once '../session_timeout.php';
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
    <link rel="stylesheet" href="../main.css">
    <title>Admin Panel</title>
</head>

<body>
    <!-- Include header -->
        <?php include 'home_header.php'; ?>
    <div class="container">
        <!-- Display message if user doesn't have enough privilege -->
        <?php if ($_SERVER['PHP_SELF'] == '/market_survey.php' && $user_type != 1) : ?>
            <p style="color: red; font-weight: bold;">You don't have enough privilege to access this page.</p>
        <?php endif; ?>

            <div class="row mt-4">
            <!-- Cards for different functionalities -->
                <?php if ($showAddUserButton) : ?>
                <div class="col-md-3 text-center">
                    <div class="card zoom mt-2">
                        <h5 class="card-header">Job Sheets</h5>
                        <div class="card-body">
                            <a href="#" class="card-link">
                                <img src="../images/jobsheet.png" class="card-img-top" alt="Job Sheets">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card zoom mt-2">
                        <h5 class="card-header">Market Survey</h5>
                        <div class="card-body">
                            <a href="../market_survey" class="card-link">
                                <img src="../images/market_survey.png" class="card-img-top" alt="Market Survey">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card zoom mt-2">
                        <h5 class="card-header">Help Desk</h5>
                        <div class="card-body">
                            <a href="../helpdesk" class="card-link">
                                <img src="../images/helpdesk.png" class="card-img-top" alt="Help Desk">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="card zoom mt-2">
                        <h5 class="card-header">User Information</h5>
                        <div class="card-body">
                            <a href="../user_info" class="card-link">
                                <img src="../images/user.png" class="card-img-top" alt="User Information">
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-md-3 text-center">
                    <div class="card zoom mt-2">
                        <h5 class="card-header">Add Gazette</h5>
                        <div class="card-body">
                            <a href="../add_gazette" class="card-link">
                                <img src="../images/gazette.png" class="card-img-top" alt="Add Gazette">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Include footer -->
    <?php include 'home_footer.php'; ?>
</body>

</html>