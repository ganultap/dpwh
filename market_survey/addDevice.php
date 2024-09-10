<?php
session_start();

// Function to end the session

// Check if the user is logged in, redirect to index.php if not
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit();
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
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-longhashcode" crossorigin="anonymous" />
    <title>Inventory</title>
    <style>
        body {
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

        .container-md {
            max-width: 50%;
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
        .scroll {
            overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
            height: 800px; /* gives an initial height of 200px to the table */
        }
        
        footer {
            width: 100%;
            background-color: #343a40;
            /* Dark background color for the footer */
            color: #ffffff;
            /* Text color for the footer */
            box-sizing: border-box; /* Include padding in width */
            flex-shrink: 0; /* Don't allow the footer to shrink */
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
    </style>
</head>

<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <a class="navbar-brand" href="./">
                    <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="40" height="40" class="">
                    Inventory Management
                </a>
            </div>
            <div class="text-right">
                <a href="inventory.php" class="btn btn-dark">Back</a>
            </div>
        </div>
    </nav>

    <div class="container-md mt-4 mb-4">
        <div class="card scroll">
            <div class="card-header">
                <h5>Add Device Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="post" action="process_add_device.php">
                            <!-- Equipment Type -->
                            <div class="mb-3">
                                <label for="equipmentType" class="form-label">Equipment Type:</label>
                                <select class="form-select" id="equipmentType" name="equipmentType" required>
                                    <option value="Desktop">Desktop</option>
                                    <option value="Laptop">Laptop</option>
                                    <option value="InkjetPrinter">Inkjet Printer</option>
                                    <option value="LaserPrinter">Laser Printer</option>
                                    <option value="IPPhone">IP Phone</option>
                                    <option value="Smartphone">Smartphone</option>
                                    <option value="DocumentScanner">Document Scanner</option>
                                    <option value="Other">Others: Specify</option>
                                </select>
                            </div>

                            <!-- Acquisition Selection -->
                            <div class="mb-3">
                                <label for="acquisitionSelection" class="form-label">Acquisition Selection:</label>
                                <select class="form-select" id="acquisitionSelection" name="acquisitionSelection"
                                    required>
                                    <option value="TurnoverCentralOffice">Turnover by Central Office</option>
                                    <option value="TurnoverContractor">Turnover by Contractor/Project</option>
                                    <option value="Procured">Procured</option>
                                </select>
                            </div>

                            <!-- Processor -->
                            <div class="mb-3" id="processorInput" style="display: none;">
                                <label for="processor" class="form-label">Processor:</label>
                                <input type="text" class="form-control" id="processor" name="processor" required>
                            </div>

                            <!-- Memory Selection -->
                            <div class="mb-3">
                                <label for="memory" class="form-label">Memory Selection:</label>
                                <select class="form-select" id="memory" name="memory">
                                    <option value="2GB">2GB</option>
                                    <option value="4GB">4GB</option>
                                    <option value="8GB">8GB</option>
                                    <option value="16GB">16GB</option>
                                    <option value="32GB">32GB</option>
                                    <!-- Add other options as needed -->
                                </select>
                            </div>

                            <!-- Hard Disk Size -->
                            <div class="mb-3" id="hardDiskSizeInput" style="display: none;">
                                <label for="hardDiskSize" class="form-label">Hard Disk Size:</label>
                                <input type="text" class="form-control" id="hardDiskSize" name="hardDiskSize">
                            </div>

                            <!-- Operating System -->
                            <div class="mb-3" id="operatingSystemInput" style="display: none;">
                                <label for="operatingSystem" class="form-label">Operating System:</label>
                                <input type="text" class="form-control" id="operatingSystem" name="operatingSystem">
                            </div>

                            <!-- Microsoft Office -->
                            <div class="mb-3" id="microsoftOfficeInput" style="display: none;">
                                <label for="microsoftOffice" class="form-label">Microsoft Office:</label>
                                <input type="text" class="form-control" id="microsoftOffice" name="microsoftOffice">
                            </div>

                            <!-- Other Installed Software -->
                            <div class="mb-3" id="otherInstalledSoftwareInput" style="display: none;">
                                <label for="otherInstalledSoftware" class="form-label">Other Installed Software:</label>
                                <textarea type="text" class="form-control" id="otherInstalledSoftware" rows="3" name="otherInstalledSoftware"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="Operational">Operational</option>
                                    <option value="For Repair">For Repair</option>
                                    <option value="Unserviceable">Unserviceable</option>
                                    <option value="For Disposal">For Disposal</option>
                                </select>
                            </div>

                            <!-- ARE / PAR / ICS Number -->
                            <div class="mb-3">
                                <label for="parNumber" class="form-label">ARE / PAR / ICS Number:</label>
                                <input type="text" class="form-control" id="parNumber" name="parNumber" required>
                            </div>

                            <!-- Serial Number -->
                            <div class="mb-3">
                                <label for="serialNumber" class="form-label">Serial Number:</label>
                                <input type="text" class="form-control" id="serialNumber" name="serialNumber" required>
                            </div>

                            <!-- Inventory Number -->
                            <div class="mb-3">
                                <label for="inventoryNumber" class="form-label">Inventory Number:</label>
                                <input type="text" class="form-control" id="inventoryNumber" name="inventoryNumber"
                                    required>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <!-- Brand -->
                            <div class="mb-3">
                                <label for="brandModel" class="form-label">Brand:</label>
                                <input type="text" class="form-control" id="brandModel" name="brandModel" required>
                            </div>

                            <!-- Model -->
                            <div class="mb-3">
                                <label for="brandModel" class="form-label">Model:</label>
                                <input type="text" class="form-control" id="brandModel" name="brandModel" required>
                            </div>

                            <!-- Unit Cost -->
                            <div class="mb-3">
                                <label for="unitValue" class="form-label">Unit Cost:</label>
                                <input type="number" class="form-control" id="unitValue" name="unitValue" required>
                            </div>

                            <!-- End User -->
                            <div class="mb-3">
                                <label for="endUser" class="form-label">End User:</label>
                                <input type="text" class="form-control" id="endUser" name="endUser" required>
                            </div>

                            <!-- Designation -->
                            <!-- Add the relevant field for designation here -->

                            <!-- Section -->
                            <!-- Add the relevant field for section here -->

                            <!-- Asset Owner -->
                            <div class="mb-3">
                                <label for="assetOwner" class="form-label">Asset Owner:</label>
                                <input type="text" class="form-control" id="assetOwner" name="assetOwner" required>
                            </div>

                            <!-- Date Received -->
                            <div class="mb-3">
                                <label for="dateReceived" class="form-label">Date Received:</label>
                                <input type="date" class="form-control" id="dateReceived" name="dateReceived" required>
                            </div>

                            <!-- Received From -->
                            <div class="mb-3">
                                <label for="receivedFrom" class="form-label">Received From:</label>
                                <input type="text" class="form-control" id="receivedFrom" name="receivedFrom" required>
                            </div>

                            <!-- Supplier (if applicable) -->
                            <div class="mb-3">
                                <label for="supplier" class="form-label">Supplier (If applicable):</label>
                                <input type="text" class="form-control" id="supplier" name="supplier">
                            </div>

                            <!-- Date of Acquisition -->
                            <!-- Add the relevant field for the date of acquisition here -->

                            <!-- Remarks -->
                            <!-- Add the relevant field for remarks here -->

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Add Device</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var equipmentTypeSelect = document.getElementById("equipmentType");
            var processorInput = document.getElementById("processorInput");
            var hardDiskSizeInput = document.getElementById("hardDiskSizeInput");
            var operatingSystemInput = document.getElementById("operatingSystemInput");
            var microsoftOfficeInput = document.getElementById("microsoftOfficeInput");
            var otherInstalledSoftwareInput = document.getElementById("otherInstalledSoftwareInput");

            // Function to toggle visibility of fields based on equipment type
            function toggleFieldsVisibility() {
                var selectedEquipmentType = equipmentTypeSelect.value;

                if (selectedEquipmentType === "Desktop" || selectedEquipmentType === "Laptop") {
                    processorInput.style.display = "block";
                    hardDiskSizeInput.style.display = "block";
                    operatingSystemInput.style.display = "block";
                    microsoftOfficeInput.style.display = "block";
                    otherInstalledSoftwareInput.style.display = "block";
                } else {
                    processorInput.style.display = "none";
                    hardDiskSizeInput.style.display = "none";
                    operatingSystemInput.style.display = "none";
                    microsoftOfficeInput.style.display = "none";
                    otherInstalledSoftwareInput.style.display = "none";
                }
            }

            // Show/hide fields on page load
            toggleFieldsVisibility();

            // Show/hide fields on equipment type change
            equipmentTypeSelect.addEventListener("change", toggleFieldsVisibility);
        });
    </script>
    <footer class="text-light text-center">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> DPWH Butuan City District Engineering Office. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-4S2psXpAC5Pa4RNHtrzRzpiNLMwb0aPXNkx1bs1tA9VXmFuJQZ4aVbI6SshzgR9TO" crossorigin="anonymous">
    </script>
</body>

</html>
