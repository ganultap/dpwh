<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the necessary files
include_once("index_header.php");
include_once("nav.php");


// Instantiate DashboardController and fetch data
$dashboardController = new DashboardController();
$data = $dashboardController->fetchData();

?>
<body class="bg-gray-50">
    <!-- Bootstrap Bundle with Popper -->
    <script src="../scripts/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> -->
    <!-- Custom JavaScript -->
    <div class="message-container">
        <?php if (isset($_GET['success'])): ?>
        <div class="message success-message">
            <?php echo $_GET['success']; ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
        <div class="message error-message">
            <?php echo $_GET['error']; ?>
        </div>
        <?php endif; ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var messages = document.querySelectorAll('.message');

            messages.forEach(function (message) {
                setTimeout(function () {
                    message.style.opacity = '0';
                }, 3000);
            });
        });
    </script>
<div class="col-10">
    <div class="main-content">
    <?php 
   include_once('AddItemModal.php'); include_once('DesktopModal.php'); include_once('LaptopModal.php'); include_once('PrinterModal.php'); include_once('ItemsModal.php'); include_once('EditModal.php');
   ?>
    <div class="container py-4 flex-grow">
        <div class="row">
            <div class="col-2">
                <a href="#" class="text-decoration-none text-secondary" data-bs-toggle="modal" data-bs-target="#desktopModal"
                    onclick="toggleSidebar()">
                    <h1><i class="bi bi-pc-display"></i> <?php echo $data['totalDesktop']; ?></h1>
                    Desktop
                </a>
            </div>
            <div class="col-2">
                <a href="#" class="text-decoration-none text-secondary" data-bs-toggle="modal" data-bs-target="#laptopModal"
                    onclick="toggleLaptop()">
                    <h1> <i class="bi bi-laptop"></i> <?php echo $data['totalLaptop']; ?></h1> Laptop
                </a>
            </div>
            <div class="col-2">
                <a href="#" class="text-decoration-none text-secondary" data-bs-toggle="modal" data-bs-target="#printerModal"
                    onclick="togglePrinter()">
                    <h1> <i class="bi bi-printer-fill"></i> <?php echo $data['totalPrinter']; ?></h1> Printers
                </a>
            </div>
            <div class="col-2 text-secondary">
                <h1><i class="bi bi-gear-wide-connected"></i> <?php echo $data['totalOperational']; ?></h1> Operational
            </div>
            <div class="col-2 text-secondary">
                <h1><i class="bi bi-x-circle"></i> <?php echo $data['totalUnserviceable']; ?></h1> Unserviceable
            </div>
            <div class="col-2">
                <a href="#" class="text-decoration-none  text-secondary" data-bs-toggle="modal" data-bs-target="#itemsModal"
                    onclick="toggleItems()">
                    <h1><i class="bi bi-clipboard-check"></i> <?php echo $data['totalItems']; ?></h1> Total Items
                </a>
            </div>
        </div>
        <div class="row mt-4 text-center">
            <div class="col-4 card card-doughnut">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="col-8">
                <div class="card card-vertical-bar">
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <canvas id="acquisitionChart"></canvas>
    </div>
    <!-- Bootstrap JS and jQuery (required for Bootstrap) -->
    <script src="../scripts/jquery-3.5.1.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="../scripts/bootstrap-datepicker.min.js">
    </script>
    <script src="../scripts/chart.js"></script>
    <script>
        function sanitizePHPVariable(variable) {
            // If the variable is undefined or null, return 0
            if (variable === undefined || variable === null) {
                return 0;
            }
            // If the variable is not a number, attempt to parse it to a float
            if (isNaN(variable)) {
                return parseFloat(variable) || 0;
            }
            // If the variable is already a number, return it
            return variable;
        }
        // PHP variables for the pie chart data
        const totalProcured = sanitizePHPVariable(<?php echo json_encode($data['totalProcured']); ?>);
        const totalContractor = sanitizePHPVariable(<?php echo json_encode($data['totalContractor']); ?>);
        const totalCentral = sanitizePHPVariable(<?php echo json_encode($data['totalCentral']); ?>);
        const totalNA = sanitizePHPVariable(<?php echo json_encode($data['totalNA']); ?>);
        const totalItems = sanitizePHPVariable(<?php echo json_encode($data['totalItems']); ?>);

        // PHP variables for the bar chart data
        const totalRMU = sanitizePHPVariable(<?php echo json_encode($data['totalRMU']); ?>);
        const totalPDS = sanitizePHPVariable(<?php echo json_encode($data['totalPDS']); ?>);
        const totalCS = sanitizePHPVariable(<?php echo json_encode($data['totalCS']); ?>);
        const totalODE = sanitizePHPVariable(<?php echo json_encode($data['totalODE']); ?>);
        const totalOADE = sanitizePHPVariable(<?php echo json_encode($data['totalOADE']); ?>);
        const totalHRAS = sanitizePHPVariable(<?php echo json_encode($data['totalHRAS']); ?>);
        const totalBAC = sanitizePHPVariable(<?php echo json_encode($data['totalBAC']); ?>);
        const totalCOA = sanitizePHPVariable(<?php echo json_encode($data['totalCOA']); ?>);
        const totalMS = sanitizePHPVariable(<?php echo json_encode($data['totalMS']); ?>);
        const totalSPU = sanitizePHPVariable(<?php echo json_encode($data['totalSPU']); ?>);
        const totalQAS = sanitizePHPVariable(<?php echo json_encode($data['totalQAS']); ?>);
        const totalFS = sanitizePHPVariable(<?php echo json_encode($data['totalFS']); ?>);
        const totalPS = sanitizePHPVariable(<?php echo json_encode($data['totalPS']); ?>);
        const totalICTS = sanitizePHPVariable(<?php echo json_encode($data['totalICTS']); ?>);
        const totalLADP = sanitizePHPVariable(<?php echo json_encode($data['totalLADP']); ?>);
        // Pie chart data
        var pieChart = new Chart(document.getElementById('myPieChart'), {
            type: 'doughnut',
            data: {
                labels: ['Procured', 'Turned over by Contractor', 'Turned over by Central Office', 'N/A'],
                datasets: [{
                    data: [totalProcured, totalContractor, totalCentral, totalNA],
                    backgroundColor: [
                        'rgb(75, 192, 192)',
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                family: 'Poppins',
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    title: {
                        display: false,
                        text: 'Procured Items Distribution',
                        font: {
                            family: 'Poppins',
                            size: 20,
                            weight: 'bold'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                var value = context.parsed;
                                var percentage = (value / totalItems) * 100;
                                label += value + ' (' + percentage.toFixed(2) + '%)';
                                return label;
                            }
                        }
                    }
                }
            }
        });
        var barChart = new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['PDS', 'CS', 'ODE', 'OADE', 'HRAS', 'BAC', 'COA', 'MS', 'QAS', 'FS', 'PS',
                    'ICTS', 'LADP'
                ],
                datasets: [{
                    label: 'Devices',
                    data: [totalPDS, totalCS, totalODE, totalOADE, totalHRAS, totalBAC, totalCOA, totalMS,
                        totalQAS, totalFS, totalPS, totalICTS, totalLADP
                    ],
                    backgroundColor: [
                        'rgb(75, 192, 192)',    // Light Sea Green
                        'rgb(255, 99, 132)',    // Tomato
                        'rgb(54, 162, 235)',    // Dodger Blue
                        'rgb(255, 205, 86)',    // Gold
                        'rgb(128, 128, 128)',   // Gray
                        'rgb(229, 43, 80)',     // Amaranth
                        'rgb(0, 116, 116)',     // Skobeloff
                        'rgb(0, 20, 168)',      // Zaffre
                        'rgb(173, 77, 140)',    // Cattleya
                        'rgb(66, 179, 174)',    // Cyan
                        'rgb(204, 136, 153)',   // Puce
                        'rgb(170, 0, 34)',     // Incarnadine
                        'rgb(255, 140, 0)'      // Dark Orange
                    ],
                    borderColor: [
                        'rgb(64, 224, 208)',    // Turquoise
                        'rgb(255, 69, 0)',      // Red Orange
                        'rgb(30, 144, 255)',    // Dodger Blue
                        'rgb(218, 165, 32)',    // Goldenrod
                        'rgb(105, 105, 105)',   // Dark Gray
                        'rgb(178, 34, 34)',     // Fire Brick
                        'rgb(0, 100, 0)',       // Dark Green
                        'rgb(0, 0, 139)',       // Dark Blue
                        'rgb(139, 0, 139)',     // Dark Magenta
                        'rgb(0, 139, 139)',     // Dark Cyan
                        'rgb(219, 112, 147)',   // Pale Violet Red
                        'rgb(75, 0, 130)',      // Indigo
                        'rgb(255, 140, 0)'      // Dark Orange
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        stepSize: 5,
                        ticks: {
                            font: {
                                family: 'Poppins',
                                size: 10,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                align: 'start',
                                family: 'Poppins',
                                size: 10,
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                        textAlign: 'left' // Aligns text labels in the legend to the left
                    },
                        display: false
                    },
                    title: {
                        display: false,
                        text: 'Number of Equipment Per Section',
                        padding: 20,
                        font: {
                            size: 20,
                            weight: 'bold',
                            family: 'Poppins'
                        }
                    }
                }
            }
        });
    </script>
            </div>
        </div>
<div class="col-1"></div>
</div>
    <?php if ($authCheck && ($userType != 3)): ?>
        <button class="btn btn-info mt-5" id="floatingButton" data-bs-toggle="modal" data-bs-target="#addItemModal" onclick="openModal()" style="border-radius: 50%; width: 50px; height: 50px;">
            <i class="bi bi-plus-circle" data-bs-toggle="tooltip"
            data-bs-placement="top" title="Add New Item"></i>
        </button>
    <?php endif; ?>
    <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>