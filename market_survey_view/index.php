<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="amp.css">
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <title>Market Survey Data</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="logo d-inline-block align-top">
                Market Survey
            </a>
            <div class="text-right btn-group">
                <a href="../marketSurvey" class="btn btn-info">October 2023 - Market Survey</a>
            <?php
                if ($user_type == 1 || $user_type == 2) {
                    echo '
                            <a href="ms_data.php" class="btn btn-info">Market Survey Data</a>
                            <a href="../home" class="btn btn-dark">Back</a>
                        </div>';
                }
                ?>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Average Cost and Actual Market Price</h4>
                <div class="search d-flex align-items-center">
                    <form action="#" method="GET" class="search-form w-100" id="searchForm">
                        <div class="row">
                            <!-- Year Dropdown -->
                            <div class="col-md-2 col-lg-4 mb-2">
                                <select name="year" id="year" class="form-select">
                                    <?php
                                    // Generate options for the last 10 years
                                    for ($i = date("Y"); $i >= date("Y") - 10; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Quarter Dropdown -->
                            <div class="col-md-2 col-lg-4 mb-2">
                                <select name="quarter" id="quarter" class="form-select">
                                    <option value="1">Q1</option>
                                    <option value="2">Q2</option>
                                    <option value="3">Q3</option>
                                    <option value="4">Q4</option>
                                </select>
                            </div>

                            <!-- Search Input -->
                            <div class="col-md-8 col-lg-4 mb-2">
                                <input type="text" name="avg_search" placeholder="Search..." class="search-input form-control" id="avg_search" value="<?php echo isset($_GET['avg_search']) ? htmlspecialchars($_GET['avg_search']) : ''; ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Quarter</th>
                            <th>Year</th>
                            <th>Item No.</th>
                            <th>Equipment Name</th>
                            <th style="text-align: right;">Actual Market Price</th>
                            <!-- <th style="text-align: right;">Actual Market Price</th> -->
                        </tr>
                    </thead>
                    <tbody id="searchResults">
                        <?php
                        include_once("search.php");
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer class="text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            function fetchResults() {
                var searchValue = $('#avg_search').val();
                var quarter = $('#quarter').val();
                var year = $('#year').val();

                $.ajax({
                    type: 'GET',
                    url: 'search.php',
                    data: { 
                        avg_search: searchValue, 
                        quarter: quarter, 
                        year: year 
                    },
                    success: function (response) {
                        $('#searchResults').html(response);
                    }
                });
            }

            // Trigger fetchResults on keyup in search input
            $('#avg_search').keyup(fetchResults);

            // Trigger fetchResults on change in quarter and year dropdowns
            $('#quarter, #year').change(fetchResults);
        });
    </script>
</body>

</html>
