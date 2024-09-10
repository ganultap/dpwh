<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="script.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>Market Survey</title>
    <style>
        body {
            text-align: center;
            font-family: 'Poppins';
            font-size: 14px;
            background-color: 	#05014a;
        }

        table {
            font-family: 'Poppins';
            background-color: white;
        }

        .striped-table {
            width: 70%;
            margin: 0 auto;
            font-family: sans-serif;
            overflow-x: auto;
        }

        .striped-table table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .striped-table th,
        .striped-table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .striped-table th {
            background-color: navy;
            color: white;
            position: sticky;
            top: 0;
        }

        .striped-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tableFixHead {
            overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
            height: 700px; /* gives an initial height of 200px to the table */
        }
        .tableFixHead thead th {
            position: sticky; /* make the table heads sticky */
            top: 0px; /* table head will be placed from the top of the table and sticks to it */
        }

        @media (max-width: 768px) {
            .striped-table {
                width: 90%;
            }

            td {
                min-width: auto;
            }
        }

        @media (max-width: 480px) {
            .striped-table {
                width: 100%;
            }
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40; /* Dark background color for the footer */
            color: #ffffff;
        }
        .logo img {
            transition: transform 0.6s ease-in-out;
        }
        .logo img:hover {
            transform: scale(1.2);
        }

        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        td:hover{
            background-color: #fc6b03;
            color: white;
            transition: transform 0.6s ease-in-out, box-shadow 0.6s ease-in-out;
        }

        .header-container {
            display: flex;
            align-items: center;
        }

        .header-container img {
            margin-right: 10px; /* Adjust the spacing between the logo and heading */
        }
    </style>
</head>

<body>
<nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="logo d-inline-block align-top">
                Market Survey
            </a>
            <a href="../market_survey_view" class="btn btn-dark">Back</a>
        </div>
    </nav>
    <div class="container-fluid card-header">

        <div class="container text-center">
            <div class="header-container">
                    <a href="../"><img src="../images/dpwh_logo.png" alt="DPWH Logo" width="50" height="50" class="logo"></a>
                    <h3 class="text-white mt-3">SUMMARY OF MARKET SURVEY PRICES FOR VARIOUS ICT EQUIPMENT as of <b>October 2023</b></h3>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center"> <!-- Center the row horizontally -->
                <div class="col-lg-6"> <!-- Adjust column width as needed -->
                    <form id="searchForm" onsubmit="return searchTable()" class="mb-2">
                        <div class="input-group">
                            <input type="text" id="search" class="form-control" placeholder="computer, printer, etc ..">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </div>
                        <!-- <div id="resultMessage" class="mt-3"></div> -->
                        <div class="loading-spinner" id="loadingSpinner"></div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="striped-table tableFixHead mb-4 card container-fluid">
            
        <table>
            <tr>
                <th>#</th>
                <th>Equipment</th>
                <th>Average Cost (₱)</th>
                <th>Actual Market Price (₱)</th>
            </tr>
            <tr id="computer">
                <td>1</td>
                <td>Admin Server</td>
                <td>731,116.67</td>
                <td>804,228.34</td>
            </tr>
            <tr id="computer">
                <td>2</td>
                <td>Desktop Computer (Administrative Use)</td>
                <td>138,168.21</td>
                <td>151,985.03</td>
            </tr>
            <tr id="computer">
                <td>3</td>
                <td>Desktop Computer (Application Use)</td>
                <td>162,074.88</td>
                <td>178,282.37</td>
            </tr>
            <tr id="computer">
                <td>4</td>
                <td>Desktop Computer (Specialized Application Use)</td>
                <td>248,469.23</td>
                <td>273,316.15</td>
            </tr>
            <tr id="computer">
                <td>5</td>
                <td>Laptop Computer (Administrative Use)</td>
                <td>134,789.67</td>
                <td>148,268.64</td>
            </tr>
            <tr id="computer">
                <td>6</td>
                <td>Laptop Computer (Application Use)</td>
                <td>159,026.33</td>
                <td>174,928.96</td>
            </tr>
            <tr id="computer">
                <td>7</td>
                <td>Laptop Computer (Specialized Application Use)</td>
                <td>301,780.00</td>
                <td>331,958.00</td>
            </tr>
            <tr id="printer">
                <td>8</td>
                <td>Multi-Function Inkjet Plotter 36in</td>
                <td>1,009,333.33</td>
                <td>1,110,266.66</td>
            </tr>
            <tr id="printer">
                <td>9</td>
                <td>Multi-Function Inkjet Printer A3</td>
                <td>107,500.00</td>
                <td>118,250.00</td>
            </tr>
            <tr id="printer">
                <td>10</td>
                <td>Multi-Function Inkjet Printer (A3, Leased)</td>
                <td>6,433.33</td>
                <td>7,076.66</td>
            </tr>
            <tr id="printer">
                <td>11</td>
                <td>Multi-Function Inkjet Printer (A4, Leased)</td>
                <td>4,666.67</td>
                <td>5,133.34</td>
            </tr>
            <tr id="printer">
                <td>12</td>
                <td>Multi-Function Inkjet Printer A4</td>
                <td>56,233.33</td>
                <td>61,856.66</td>
            </tr>
            <tr id="printer">
                <td>13</td>
                <td>Multi-Function Laser Printer (Color, A3)</td>
                <td>536,050.00</td>
                <td>589,655.00</td>
            </tr>
            <tr id="printer">
                <td>14</td>
                <td>Multi-Function Laser Printer (Color, A4)</td>
                <td>363,333.33</td>
                <td>399,666.66</td>
            </tr>
            <tr id="printer">
                <td>15</td>
                <td>Multi-Function Laser Printer (Monochrome, A4)</td>
                <td>209,833.33</td>
                <td>230,816.66</td>
            </tr>
            <tr id="network">
                <td>16</td>
                <td>Firewall</td>
                <td>2,863,833.33</td>
                <td>3,150,216.66</td>
            </tr>
            <tr id="network">
                <td>17</td>
                <td>Network Switch Layer 2</td>
                <td>262,466.67</td>
                <td>288,713.34</td>
            </tr>
            <tr id="network">
                <td>18</td>
                <td>Network Switch Layer 3</td>
                <td>676,754.33</td>
                <td>744,429.76</td>
            </tr>
            <tr id="network">
                <td>19</td>
                <td>Router</td>
                <td>971,566.67</td>
                <td>1,068,723.34</td>
            </tr>
            <tr id="ups">
                <td>20</td>
                <td>Uninterruptible Power Supply (2KVA)</td>
                <td>279,216.33</td>
                <td>307,137.96</td>
            </tr>
            <tr id="ups">
                <td>21</td>
                <td>Uninterruptible Power Supply (3KVA)</td>
                <td>294,779.67</td>
                <td>324,257.64</td>
            </tr>
            <tr id="ups">
                <td>22</td>
                <td>Uninterruptible Power Supply (10KVA)</td>
                <td>542,599.33</td>
                <td>596,859.26</td>
            </tr>
            <tr id="ups">
                <td>23</td>
                <td>Uninterruptible Power Supply (Admin Server)</td>
                <td>160,300.00</td>
                <td>176,330.00</td>
            </tr>
            <tr id="ups">
                <td>24</td>
                <td>Uninterruptible Power Supply (Workstation)</td>
                <td>16,960.00</td>
                <td>18,656.00</td>
            </tr>
        </table>
    </div>
    <script>
    function showLoadingSpinner() {
        document.getElementById("loadingSpinner").style.display = "block";
    }

    function hideLoadingSpinner() {
        document.getElementById("loadingSpinner").style.display = "none";
    }

    function searchTable() {
        showLoadingSpinner(); // Show loading spinner

        // Simulate a delay (you can replace this with your actual search logic)
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.querySelector(".striped-table table");
        tr = table.getElementsByTagName("tr");
        var resultCount = 0;

        for (i = 0; i < tr.length; i++) {
            var currentId = tr[i].id.toUpperCase(); // Get the ID of the current row

            // Loop through all td elements in the current row
            for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];

                if (td) {
                    txtValue = td.textContent || td.innerText;

                    // Check if the current row has the same ID as the search result or if it matches the search term
                    if (currentId === filter || txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        tr[i].classList.add("highlight");
                        resultCount++;
                        break; // Break out of the loop if a match is found
                    } else {
                        tr[i].style.display = "none";
                        tr[i].classList.remove("highlight");
                    }
                }
            }
        }

        // Update and display the result message
        var resultMessage = document.getElementById("resultMessage");
        if (resultCount > 0) {
            resultMessage.innerText = resultCount + " result(s) found.";
            resultMessage.style.color = "green";
        } else {
            resultMessage.innerText = "No results found.";
            resultMessage.style.color = "red";
        }

        hideLoadingSpinner(); // Hide loading spinner after search is complete
        return false; // Prevent the form from submitting
    }

    // Bind the searchTable function to the input event of the search input field
    document.getElementById("search").addEventListener("input", searchTable);
</script>

    
    </div>
  </body>
  <!-- <footer class="text-light">
    <div class="container">
        <p>&copy; 2024 DPWH Butuan City District Engineering Office. All rights reserved.</p>
    </div>
</footer> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
