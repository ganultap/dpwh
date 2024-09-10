<?php
session_start();

// Function to end the session

// Check if the user is logged in, redirect to index.php if not
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Check if the logout button is clicked

// Assuming the inventory items are stored in an array
$inventoryItems = array(
    array("id" => 1, "name" => "Item 1", "quantity" => 10),
    array("id" => 2, "name" => "Item 2", "quantity" => 15),
    // Add more items as needed
);

// Function to filter inventory items based on the search query
function filterInventory($query) {
    global $inventoryItems;
    $filteredItems = array();
    foreach ($inventoryItems as $item) {
        if (stripos($item['name'], $query) !== false) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

// Check if a search query is submitted
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
if ($searchQuery !== '') {
    $filteredInventory = filterInventory($searchQuery);
} else {
    // Display all inventory items initially
    $filteredInventory = $inventoryItems;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="icon" href="../dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-longhashcode" crossorigin="anonymous" />
    <title>Inventory</title>
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
            flex-direction: column;
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
        }

        .container {
            max-width: 80%;
            flex: 1;
        }

        .logout-btn {

            color: white;
            padding: 5px 5px;
            /* Adjust padding to make it smaller */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 10px;
            /* Adjust font size to make it smaller */
            background-color: orange;
        }

        .btn-danger:hover {
            background-color: blue;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .welcome-message {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

        .nav-cards {
            display: flex;
            gap: 20px;
        }

        .card-link {
            text-decoration: none;
            color: #333;
        }

        .card-link:hover {
            color: #e44d26;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            /* Dark background color for the footer */
            color: #ffffff;
            /* Text color for the footer */
            /* Padding for the footer content */
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .zoom {
            transition: transform 0.6s ease-in-out;
            position: relative;
            z-index: 1;
        }

        .zoom:hover {
            transform: scale(1.05);
            z-index: 2;
        }

        .logo img {
            transition: transform 0.6s ease-in-out;
        }

        .logo img:hover {
            transform: scale(1.2);
        }
        .btn-dp-orange{
            background-color: #fc6b03;
            color: white;
        }
        .btn-dp-blue{
            background-color: #003DA5;
            color: white;
        }
        
    </style>
</head>

<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <a class="navbar-brand" href="./">
                    <img src="../dpwh_logo.png" alt="DPWH Logo" width="40" height="40" class="">
                    Inventory Management
                </a>
            </div>
            <div class="text-right">
                <a href="addDevice.php" class="btn btn-dp-blue">Add Device</a>
                <a href="home.php" class="btn btn-dark">Back</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Add the rest of the code from the previous response here -->

        <!-- Search Input and Button -->
        <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <form method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="PAR No., Serial No., Device Type, Asset owner .." name="search"
                            value="<?php echo htmlspecialchars($searchQuery); ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <!-- Inventory Table -->
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <!-- Table headers and body from the previous response -->
                </table>
            </div>
        </div>
    </div>

    <footer class="text-light">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-4S2psXpAC5Pa4RNHtrzRzpiNLMwb0aPXNkx1bs1tA9VXmFuJQZ4aVbI6SshzgR9TO" crossorigin="anonymous">
    </script>
</body>

</html>
