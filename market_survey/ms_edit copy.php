<?php
// Start the session
session_start();

// Include the database connection file
require_once '../db_connect.php';


// After successful update
// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Function to get item details from the database
function getItemDetails($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM market_survey_details WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();
    return $item;
}

// Function to generate options for select elements
function generateOptions($selectedValue, $options) {
    foreach ($options as $value => $text) {
        $selected = ($selectedValue == $value) ? 'selected' : '';
        echo "<option value='$value' $selected>$text</option>";
    }
}

// Retrieve item ID from the URL
$id = $_GET['id'] ?? '';

// Check if the ID is valid
if (empty($id)) {
    // If ID is empty, redirect to an error page or display an error message
    $_SESSION['message'] = "Item ID not provided.";
    $_SESSION['message_type'] = "danger";
    header("Location: error.php"); // Change error.php to the appropriate error page
    exit();
}

// Fetch item details from the database
$item = getItemDetails($conn, $id);

// Check if the item exists
if ($item) {
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
    <link rel="stylesheet" href="edit.css">
    <title>Edit Market Survey Offer Details</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <a class="navbar-brand" href="#">
                    <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="">
                    Market Survey
                </a>
            </div>
            <div class="text-right">
                <a href="../market_survey" class="btn btn-danger">Back</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card form-container mt-2 mb-1">
            <div class="card-header text-center">
                <h5>Edit Market Survey Offer Details</h5>
            </div>
            <div class="card-body">
                <form action="ms_edit_process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" id="item_no" name="item_no" placeholder="Item No."
                                value="<?php echo htmlspecialchars($item['item_no']); ?>" required>
                        </div>
                        <div class="col-4">
                            <select id="quarter" name="quarter" required>
                                <option value="" disabled>Choose Quarter</option>
                                <?php
                                $quarters = ['1st', '2nd', '3rd', '4th'];

                                foreach ($quarters as $index => $quarter) {
                                    $value = $index + 1; // Increment index by 1 to match option values
                                    $selected = ($item['quarter'] == $quarter) ? 'selected' : '';
                                    echo "<option value=\"$value\" $selected>$quarter</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" id="year" name="year" placeholder="Year"
                                value="<?php echo htmlspecialchars($item['year']); ?>" required>
                        </div>
                    </div>

                    <input class="form-control p-2 mt-1" type="number" id="unit_cost" name="unit_cost"
                        placeholder="Unit Cost" step="any" value="<?php echo htmlspecialchars($item['unit_cost']); ?>"
                        required>
                    <br>
                    <label for="equipment_type_id">Equipment Type:</label>
                    <select id="equipment_type_id" name="equipment_type_id" required>
                        <option value="" disabled>Choose</option>
                        <?php
                        $equipmentTypes = [
                            1 => 'Computers',
                            2 => 'Inkjet',
                            3 => 'Laser',
                            4 => 'Network Equipment',
                            5 => 'Other ICT Equipment',
                            6 => 'Uninterruptible Power Supply'
                        ];

                        foreach ($equipmentTypes as $id => $type) {
                            $selected = ($item['equipment_type_id'] == $id) ? 'selected' : '';
                            echo "<option value=\"$id\" $selected>$type</option>";
                        }
                        ?>
                    </select>

                    <div id="additionalFields">
                        <label for="sub_cat_id">Sub-Category:</label>
                        <select id="sub_cat_id" name="sub_cat_id">
                            <option value="" selected disabled>Choose Sub-Category</option>
                            <?php
                            $subCategories = [
                                9  => 'Biometrics',
                                6  => 'Firewall',
                                1  => 'Desktop',
                                10 => 'Document Scanner',
                                11 => 'Indoor LED Video Wall',
                                12 => 'Interactive Kiosk',
                                13 => 'Interactive Touch Screen',
                                2  => 'Laptop',
                                4  => 'Printer',
                                5  => 'Plotter',
                                15 => 'Projector',
                                7  => 'Router',
                                3  => 'Server',
                                16 => 'Smartphone',
                                14 => 'IP Phone',
                                8  => 'Network Switch',
                                17 => 'UPS'
                            ];

                            foreach ($subCategories as $id => $subCategory) {
                                $selected = ($item['sub_cat_id'] == $id) ? 'selected' : '';
                                echo "<option value=\"$id\" $selected>$subCategory</option>";
                            }
                            ?>
                        </select>

                        <label for="description_id">Description:</label>
                        <select id="description_id" name="description_id">
                            <option value="" selected disabled>Choose Description</option>
                            <?php
                            $descriptions = [
                                1  => 'Admin',
                                2  => 'eNGAS or eBUDGET',
                                3  => 'Administrative Use',
                                4  => 'Application Use',
                                5  => 'Specialized Software Applications Use',
                                6  => 'Color (36in)',
                                7  => 'A3',
                                8  => 'A3 Leased',
                                9  => 'A4 Leased',
                                10 => 'A4',
                                11 => 'Large Format (24in)',
                                12 => 'Color (42-44in)',
                                14 => 'Color (A3)',
                                15 => 'Color (A4)',
                                16 => 'Monochrome (A3)',
                                17 => 'Monochrome (A4)',
                                27 => 'No Description',
                                18 => 'Layer 2 (48 POE Ports, Managed)',
                                19 => 'Layer 3 (48 POE Ports, Managed)',
                                20 => 'Conference Rooms',
                                21 => 'Wide Format (42in)',
                                22 => '650VA',
                                23 => '1500VA',
                                24 => '2000VA',
                                25 => '3000VA'
                            ];

                            foreach ($descriptions as $id => $description) {
                                $selected = ($item['description_id'] == $id) ? 'selected' : '';
                                echo "<option value=\"$id\" $selected>$description</option>";
                            }
                            ?>
                        </select>

                        <label for="supplier_id">Supplier:</label>
                        <select id="supplier_id" name="supplier_id">
                            <option value="" selected disabled>Choose Supplier</option>
                            <?php
                            $suppliers = [
                                7  => 'BXU',
                                9  => 'Bigbytes',
                                6  => 'Columbia',
                                2  => 'Dataworld',
                                11 => 'EliteKonexion',
                                3  => 'Fast Tech',
                                8  => 'Global Chips',
                                1  => 'Microtrade',
                                5  => 'Inkbox',
                                4  => 'PowerOn',
                                10 => 'Wizard'
                            ];

                            foreach ($suppliers as $id => $supplier) {
                                $selected = ($item['supplier_id'] == $id) ? 'selected' : '';
                                echo "<option value=\"$id\" $selected>$supplier</option>";
                            }
                            ?>
                        </select>

                        <label for="brand_id">Brand:</label>
                        <select id="brand_id" name="brand_id">
                            <option value="" selected disabled>Choose Brand</option>
                            <?php
                            $brands = [
                                17 => 'ALCATEL',
                                19 => 'APC',
                                13 => 'APPLE',
                                11 => 'AVAYA',
                                5  => 'ACER',
                                2  => 'ASUS',
                                10 => 'BROTHER',
                                8  => 'CANON',
                                7  => 'DEVELOP',
                                3  => 'DELL',
                                20 => 'EATON',
                                16 => 'EXTREME',
                                9  => 'EPSON',
                                6  => 'FUJIXEROX',
                                1  => 'HP',
                                4  => 'LENOVO',
                                12 => 'SAMSUNG',
                                14 => 'SOPHOS',
                                15 => 'UBIQUITI',
                                18 => 'VERTIV LIEBERT',
                                21 => 'RICOH'
                            ];

                            foreach ($brands as $id => $name) {
                                $selected = ($item['brand_id'] == $id) ? 'selected' : '';
                                echo "<option value=\"$id\" $selected>$name</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input class="form-control p-2" type="text" id="model_name" name="model_name"
                            placeholder="Model Name" value="<?php echo htmlspecialchars($item['model_name']); ?>" required>
                    </div>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <footer class="text-light text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>

<?php
} else {
    // Item not found, redirect to an error page or display an error message
    $_SESSION['message'] = "Item not found.";
    $_SESSION['message_type'] = "danger";
    header("Location: error.php"); // Change error.php to the appropriate error page
    exit();
}

// Close the database connection
$conn->close();
?>