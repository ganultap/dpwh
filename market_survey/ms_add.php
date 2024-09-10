<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
}

include_once("../db_connect.php");

if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {

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
    <link rel="stylesheet" href="add.css">
    <title>Market Survey</title>
</head>

<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <a class="navbar-brand" href="#">
                    <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="">
                    Market Survey
                </a>
            </div>
            <div class="text-right">
                <a href="../market_survey" class="btn btn-dark">Back</a>
            </div>
        </div>
    </nav>

    <body>
    <div class="container">
        <div class="card form-container mt-2 mb-1">
            <div class="card-header text-center">
                <h5>Add Market Survey Offer Details</h5>
                <?php if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) : ?>
                    <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php
                    // Unset the session variables after displaying the message
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                    ?>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <form action="ms_process.php" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" id="item_no" name="item_no" placeholder="Item No." required>
                        </div>
                        <div class="col-4">
                            <!-- <input type="text" id="quarter" name="quarter" placeholder="Quarter" required> -->
                            <select id="quarter" name="quarter" required>
                                <option value="" selected disabled>Choose Quarter</option>
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>

                            </select>
                        </div>
                        <div class="col-4">
                            <input type="text" id="year" name="year" placeholder="Year" required>
                        </div>
                    </div>

                    <input class="form-control p-2 mt-1" type="number" id="unit_cost" name="unit_cost" placeholder="Unit Cost" step="any" required>
                    <br>
                    <label for="equipment_type_id">Equipment Type:</label>
                    <select id="equipment_type_id" name="equipment_type_id" onchange="updateOptions()">
                    <option value="" selected disabled>Choose Equipment Type</option>
                    <option value="1">Computers</option>
                    <option value="2">Multifunction Inkjet</option>
                    <option value="3">Multifunction Laser</option>
                    <option value="4">Network Equipment</option>
                    <option value="5">Other ICT Equipment</option>
                    <option value="6">Uninterruptible Power Supply</option>
                    
                </select>

                <div id="additionalFields">
                        <label for="sub_cat_id">Sub-Category:</label>
                        <select id="sub_cat_id" name="sub_cat_id">
                            <option value="" selected disabled>Choose Sub-Category</option>
                            <option value="9">Biometrics</option>
                            <option value="6">Firewall</option>
                            <option value="1">Desktop</option>
                            <option value="10">Document Scanner</option>
                            <option value="11">Indoor LED Video Wall</option>
                            <option value="12">Interactive Kiosk</option>
                            <option value="13">Interactive Touch Screen</option>
                            <option value="2">Laptop</option>
                            <option value="4">Printer</option>
                            <option value="5">Plotter</option>
                            <option value="15">Projector</option>
                            <option value="7">Router</option>
                            <option value="3">Server</option>
                            <option value="16">Smartphone</option>
                            <option value="14">IP Phone</option>
                            <option value="8">Network Switch</option>
                            <option value="17">UPS</option>
                        </select>


                        <label for="description_id">Description:</label>
                        <select id="description_id" name="description_id">
                            <option value="" selected disabled>Choose Description</option>
                            <option value="1">Admin</option>
                            <option value="2">eNGAS or eBUDGET</option>
                            <option value="3">Administrative Use</option>
                            <option value="4">Application Use</option>
                            <option value="5">Specialized Software Applications Use</option>
                            <option value="6">Color (36in)</option>
                            <option value="7">A3</option>
                            <option value="8">A3 Leased</option>
                            <option value="9">A4 Leased</option>
                            <option value="10">A4</option>
                            <option value="11">Large Format (24in)</option>
                            <option value="12">Color (42-44in)</option>
                            <option value="14">Color (A3)</option>
                            <option value="15">Color (A4)</option>
                            <option value="16">Monochrome (A3)</option>
                            <option value="17">Monochrome (A4)</option>
                            <option value="27">No Description</option>
                            <option value="18">Layer 2 (48 POE Ports, Managed)</option>
                            <option value="19">Layer 3 (48 POE Ports, Managed)</option>
                            <option value="20">Conference Rooms</option>
                            <option value="21">Wide Format (42in)</option>
                            <option value="22">650VA</option>
                            <option value="23">1500VA</option>
                            <option value="24">2000VA</option>
                            <option value="25">3000VA</option>
                        </select>

                        <label for="supplier_id">Supplier:</label>
                        <select id="supplier_id" name="supplier_id">
                            <option value="" selected disabled>Choose Supplier</option>
                            <option value="12">Biologic</option>
                            <option value="9">Bigbytes</option>
                            <option value="7">BXU</option>
                            <option value="16">Cornersteel</option>
                            <option value="6">Columbia</option>
                            <option value="2">Dataworld</option>
                            <option value="11">EliteKonexion</option>
                            <option value="3">Fast Tech</option>
                            <option value="8">Global Chips</option>
                            <option value="5">Inkbox</option>
                            <option value="14">LaserTech</option>
                            <option value="1">Microtrade</option>
                            <option value="15">PhilCopy</option>
                            <option value="4">PowerOn</option>
                            <option value="13">Technomart</option>
                            <option value="10">Wizard</option>
                        </select>


                        <label for="brand_id">Brand:</label>
                        <select id="brand_id" name="brand_id">
                            <option value="" selected disabled>Choose Brand</option>
                            <option value="17">ALCATEL</option>
                            <option value="19">APC</option>
                            <option value="13">APPLE</option>
                            <option value="11">AVAYA</option>
                            <option value="5">ACER</option>
                            <option value="2">ASUS</option>
                            <option value="10">BROTHER</option>
                            <option value="8">CANON</option>
                            <option value="7">DEVELOP</option>
                            <option value="3">DELL</option>
                            <option value="20">EATON</option>
                            <option value="16">EXTREME</option>
                            <option value="9">EPSON</option>
                            <option value="6">FUJIXEROX</option>
                            <option value="1">HP</option>
                            <option value="4">LENOVO</option>
                            <option value="12">SAMSUNG</option>
                            <option value="14">SOPHOS</option>
                            <option value="15">UBIQUITI</option>
                            <option value="18">VERTIV LIEBERT</option>
                        </select>
                        <br>
                        <input class="form-control p-2" type="text" id="model_name" name="model_name" placeholder="Model Name" required>
                    </div>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <script>
        function updateOptions() {
            var equipmentType = document.getElementById("equipment_type_id").value;
            var subCategoryOptions = document.getElementById("sub_cat_id");
            var descriptionOptions = document.getElementById("description_id");
            var brandOptions = document.getElementById("brand_id");

            // Clear existing options
            subCategoryOptions.innerHTML = "";
            descriptionOptions.innerHTML = "";
            brandOptions.innerHTML = "";

            // Populate options based on selected equipment type
            switch (equipmentType) {
                case "1": // Computers
                    addOption(subCategoryOptions, "Desktop", 1);
                    addOption(subCategoryOptions, "Laptop", 2);
                    addOption(subCategoryOptions, "Server", 3);

                    addOption(descriptionOptions, "Admin", 1);
                    addOption(descriptionOptions, "eNGAS or eBUDGET", 2);
                    addOption(descriptionOptions, "Administrative Use", 3);
                    addOption(descriptionOptions, "Application Use", 4);
                    addOption(descriptionOptions, "Specialized Software Applications Use", 5);

                    addOption(brandOptions, "ACER", 5);
                    addOption(brandOptions, "ASUS", 2);
                    addOption(brandOptions, "DELL", 3);
                    addOption(brandOptions, "HP", 1);
                    addOption(brandOptions, "LENOVO", 4);
                    break;

                case "2": // Multifunction Inkjet
                case "3": // Multifunction Laser
                    addOption(subCategoryOptions, "Printer", 4);
                    addOption(subCategoryOptions, "Plotter", 5);

                    addOption(descriptionOptions, "Color (24in)", 32);
                    addOption(descriptionOptions, "Color (36in)", 6);
                    addOption(descriptionOptions, "A3", 7);
                    addOption(descriptionOptions, "A3 Leased", 8);
                    addOption(descriptionOptions, "A4 Leased", 9);
                    addOption(descriptionOptions, "A4", 10);
                    addOption(descriptionOptions, "Large Format (24in)", 11);
                    addOption(descriptionOptions, "Color (42-44in)", 12);
                    addOption(descriptionOptions, "Color (A3)", 14);
                    addOption(descriptionOptions, "Color (A4)", 15);
                    addOption(descriptionOptions, "Monochrome (A3)", 16);
                    addOption(descriptionOptions, "Monochrome (A4)", 17);

                    addOption(brandOptions, "BROTHER", 10);
                    addOption(brandOptions, "CANON", 8);
                    addOption(brandOptions, "DEVELOP", 7);
                    addOption(brandOptions, "EPSON", 9);
                    addOption(brandOptions, "FUJIXEROX", 6);
                    addOption(brandOptions, "FUJIFILM", 24);
                    addOption(brandOptions, "HP", 1);
                    addOption(brandOptions, "KYOCERA", 25);

                    break;

                case "4": // Network Equipment
                    addOption(subCategoryOptions, "Firewall", 6);
                    addOption(subCategoryOptions, "Router", 7);
                    addOption(subCategoryOptions, "Network Switch", 8);
                    addOption(subCategoryOptions, "Wireless Access Point", 24);

                    addOption(descriptionOptions, "No Description", 27);
                    addOption(descriptionOptions, "Layer 2 (48 POE Ports, Managed)", 18);
                    addOption(descriptionOptions, "Layer 3 (48 POE Ports, Managed)", 19);

                    addOption(brandOptions, "ALCATEL", 17);
                    addOption(brandOptions, "AVAYA", 11);
                    addOption(brandOptions, "CISCO", 28);
                    addOption(brandOptions, "EXTREME", 16);
                    addOption(brandOptions, "FORTINET", 29);
                    addOption(brandOptions, "PALO ALTO", 26);
                    addOption(brandOptions, "SOPHOS", 14) ;
                    addOption(brandOptions, "UBIQUITI", 15);
                
                    break;

                case "5": // Other ICT Equipment
                    addOption(subCategoryOptions, "Biometrics", 9);
                    addOption(subCategoryOptions, "Document Scanner", 10);
                    addOption(subCategoryOptions, "Indoor LED Video Wall", 11);
                    addOption(subCategoryOptions, "Interactive Kiosk", 12);
                    addOption(subCategoryOptions, "Interactive Touch Screen", 13);
                    addOption(subCategoryOptions, "IP Phone", 14);
                    addOption(subCategoryOptions, "Mobile Printer", 22);
                    addOption(subCategoryOptions, "Projector" ,15);
                    addOption(subCategoryOptions, "Smartphone", 16);
                    addOption(subCategoryOptions, "Video Conferencing System", 23);

                    addOption(descriptionOptions, "No Description", 27);
                    addOption(descriptionOptions, "Conference Rooms", 20);
                    addOption(descriptionOptions, "Travel Series/Portable", 31);
                    addOption(descriptionOptions, "Sheetfed, A4", 28);
                    addOption(descriptionOptions, "Sheetfed, A3", 29);
                    addOption(descriptionOptions, "Flatbed with ADF, A3", 30);
                    addOption(descriptionOptions, "Wide Format (42in)", 21);
                    addOption(descriptionOptions, "50 to 80 sqm", 34);

                    addOption(brandOptions, "HP", 1);
                    addOption(brandOptions, "EPSON", 9);
                    addOption(brandOptions, "CANON", 8);
                    addOption(brandOptions, "RICOH", 21);
                    addOption(brandOptions, "ACER", 5);
                    addOption(brandOptions, "ASUS", 2);
                    addOption(brandOptions, "VIEWSONIC", 22);
                    addOption(brandOptions, "LOGITECH", 27);
                    addOption(brandOptions, "PANASONIC", 23);
                    addOption(brandOptions, "SAMSUNG", 12);
                    break;

                case "6": // Uninterruptible Power Supply
                    addOption(subCategoryOptions, "Workstation", 17);
                    addOption(descriptionOptions, "650VA", 22);

                    addOption(subCategoryOptions, "Admin/eNGAS Server", 18);
                    addOption(descriptionOptions, "1500VA", 23);

                    addOption(subCategoryOptions, "Floor Distributor", 19);
                    addOption(descriptionOptions, "2000VA", 24);

                    addOption(subCategoryOptions, "Network Room/Building Distributor", 20);
                    addOption(descriptionOptions, "3000VA", 25);

                    addOption(subCategoryOptions, "Data Centers", 21);
                    addOption(descriptionOptions, "10000VA", 33);

                    addOption(brandOptions, "APC", 19);
                    addOption(brandOptions, "EATON", 20);
                    addOption(brandOptions, "DELL", 3);
                    addOption(brandOptions, "VERTIV LIEBERT", 18);
                    break;

                

            }
        }

        function addOption(selectElement, optionText, value) {
            var option = document.createElement("option");
            option.text = optionText;
            option.value = value;
            selectElement.add(option);
        }

        // Call updateOptions() when the page loads
        window.onload = updateOptions;
    </script>
    <footer class="text-light text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>

<?php
} else {
    header("Location: home.php");
    exit();
}
?>