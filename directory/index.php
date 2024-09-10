<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/dpwh_logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <title>Directory</title>
    <style>
        body {
            text-align: center;
            font-family: 'Poppins';
            font-size: 14px;
            background-color: 	#05014a;
            margin: 0;
        }
        table {
            font-family: 'Poppins';
            background-color: white;
        }
        .striped-table {
            width: 70%;
            margin: 0 auto;
            font-family: sans-serif;
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
        }

        .striped-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
            color: rgb(241, 36, 9);
            align-content: center;
        }

        th {
            min-width: none;
        }
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            min-width: 300px; /* Set the minimum width for the cells */
        }
        .subheader {
            background-color: rgb(64, 205, 248);
            color: rgb(5, 5, 88);
        }
        .sh {
            font-weight: bold;
        }
        .logo img {
            transition: transform 1.0s ease-in-out;
        }
        .logo img:hover {
            transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
        .tableFixHead {
            overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
            height: 600px; /* gives an initial height of 200px to the table */
        }
        .tableFixHead thead th {
            position: sticky; /* make the table heads sticky */
            top: 0px; /* table head will be placed from the top of the table and sticks to it */
        }
        .tableFixHead2 {
            overflow-y: auto; /* make the table scrollable if height is more than 200 px  */
            height: 200px; /* gives an initial height of 200px to the table */
        }
        .tableFixHead2 thead th {
            position: sticky; /* make the table heads sticky */
            top: 0px; /* table head will be placed from the top of the table and sticks to it */
        }
        .red {
            color: red;
        }
        .container-fluid {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .container {
            width: 100%;
        }
        
        /* ... (existing styles) */
        
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
            #search {
                width: 80%; /* Adjust the width of the search input on smaller screens */
            }
            button {
                width: 100%; /* Make the button full width on smaller screens */
            }
        }
/* Add these styles for the search */
        .search-container {
            margin: 20px 0;
            text-align: center;
        }

        #search {
            padding: 8px;
            font-size: 14px;
        }

        #search:focus {
            outline: none;
            border: 2px solid navy;
        }

        button {
            padding: 8px 12px;
            background-color: navy;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #001f3f;
        }
        .zoom {
            transition: transform 0.6s ease-in-out;
            position: relative;
            z-index: 1;
        }
        .zoom:hover {
            transform: scale(1.1);
            z-index: 2;
        }
        .loading-spinner {
            display: none;
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -20px;
            margin-left: -20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
    <div class="container-fluid">
        
        <div class="container-fluid text-center">
            <!-- Row 1: Logo and TELEPHONE DIRECTORY -->
            <div class="header-container">
                <a href="../"><img src="../images/dpwh_logo.png" alt="DPWH Logo" width="50" height="50" class="mt-2"></a>
                <h3 class="mt-3 mb-2"><b>TELEPHONE DIRECTORY</b></h3>
            </div>
            <!-- Row 2: Search centered with 50% width -->
            <div class="row justify-content-center container-fluid">
                <form id="searchForm" onsubmit="return searchTable()" class="mb-2 col-lg-6">
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" style="width: 50%;" placeholder="ode, oade, hras, fs, cs, ms, qas, pds, icts ...">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </div>
                    <div class="loading-spinner" id="loadingSpinner"></div>
                </form>
            </div>
        </div>

<div class="container-fluid">
    <div class="striped-table tableFixHead card ">
        <table>
            <thead class="card-header">
                <tr>
                    <th>USER</th>
                    <th>POSITION / DESIGNATION</th>
                    <th class="loc">LOCAL NO.</th>
                </tr>
            </thead>
            <tbody class="card-body">
                <tr id="ode">
                    <td colspan="4" class="subheader">OFFICE OF THE DISTRICT ENGINEER</td>
                </tr>
                <tr id="ode" class="sh">
                    <td>JOSE CAESAR A. RADAZA</td>
                    <td>District Engineer</td>
                    <td>84601</td>
                    
                </tr>
                <tr id="ode">
                    <td>CELESTE NIOG</td>
                    <td>Secretary</td>
                    <td>84602</td>
                </tr>
                <tr id="oade">
                    <td colspan="4" class="subheader">OFFICE OF THE ASSISTANT DISTRICT ENGINEER</td>
                </tr>
                <tr id="oade" class="sh">
                    <td>GRACE T. CURAYAG</td>
                    <td>Assistant District Engineer</td>
                    <td>84603</td>
                </tr>
                <tr id="oade">
                    <td>JUDE GRACE O. MATULAC</td>
                    <td>Secretary</td>
                    <td>84604</td>
                </tr>
                <tr id="ps">
                    <td colspan="4" class="subheader">PROCUREMENT STAFF</td>
                </tr>
                <tr id="ps" class="sh">
                    <td>TERESITA E. PAGAR</td>
                    <td>Head, Procurement Staff</td>
                    <td>84661</td>
                </tr>
                <tr id="ps">
                    <td>SHERRIE O. HIMO</td>
                    <td>Staff</td>
                    <td>84655</td>
                </tr>
                <tr id="ps" class="sh">
                    <td>JULIO S. FUENTES</td>
                    <td>Head, BAC - TWG</td>
                    <td>84662</td>
                </tr>
                <tr id="ps"> 
                    <td>LUCKY MAE A. MATIAS</td>
                    <td>Staff</td>
                    <td>84605</td>
                </tr>
                <tr id="icts">
                    <td colspan="4" class="subheader">INFORMATION AND COMMUNICATIONS TECHNOLOGY STAFF</td>
                </tr>
                <tr id="icts" class="sh">
                    <td>JAN MARK S. GUIBONE</td>
                    <td>District IT Support Officer</td>
                    <td>84622</td>
                </tr>
                <tr id="icts">
                    <td></td>
                    <td>ICT Front Desk</td>
                    <td>84624</td>
                </tr>
                <tr id="icts">
                    <td></td>
                    <td>ICT Repair Room</td>
                    <td>84651</td>
                </tr>
                <tr id="icts">
                    <td></td>
                    <td>Main Network Room</td>
                    <td>84656</td>
                </tr>
                <tr id="icts">
                    <td></td>
                    <td>Main Data Center</td>
                    <td>84632</td>
                </tr>
                <tr id="icts" class="red">
                    <td></td>
                    <td>IDF2</td>
                    <td>84633</td>
                </tr>
                <tr id="pis">
                    <td colspan="4" class="subheader">PUBLIC INFORMATION STAFF</td>
                </tr>
                <tr id="pis" class="sh">
                    <td>JENNITH S. LAGUESMA - PODOT</td>
                    <td>Designated Public Information Officer</td>
                    <td>84641</td>
                </tr>
                <tr id="pis">
                    <td>ZENNITH L. TORRALBA</td>
                    <td>Public Information Staff (Front Desk Ground Floor Lobby)</td>
                    <td>84600</td>
                </tr>
                <tr id="pis">
                    <td></td>
                    <td>Public Information Staff (Office)</td>
                    <td>84678</td>
                </tr>
                <tr id="cr">
                    <td colspan="4" class="subheader">CONFERENCE ROOM</td>
                </tr>
                <tr id="cr">
                    <td>CONFERENCE ROOM</td>
                    <td>2nd Floor Main Building</td>
                    <td>84626</td>
                </tr>
                <tr id="cr">
                    <td>NOA HALL</td>
                    <td>Main Conference Hall</td>
                    <td>84640</td>
                </tr>
                <tr>
                    <td colspan="4" class="subheader">CLINIC</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Office Nurse</td>
                    <td>84642</td>
                </tr>
                <tr id="hras">
                    <td colspan="4" class="subheader">HUMAN RESOURCE AND ADMINISTRATIVE SECTION</td>
                </tr>
                <tr id="hras" class="sh">
                    <td>JENNITH S. LAGUESMA - PODOT</td>
                    <td>Chief, HRAS</td>
                    <td>84617</td>
                </tr>
                <tr id="hras">
                    <td></td>
                    <td>Staff, HRAS</td>
                    <td>84628</td>
                </tr>
                <tr id="hras" class="sh">
                    <td>HRMO II</td>
                    <td>Head, HRMDU</td>
                    <td>84618</td>
                </tr>
                <tr id="hras">
                    <td></td>
                    <td>Staff, HRDMU</td>
                    <td>84685</td>
                </tr>
                <tr id="hras" class="sh">
                    <td>MARLE Q. CATALAN</td>
                    <td>Head, Records Management Unit</td>
                    <td>84654</td>
                </tr>
                <tr id="hras">
                    <td></td>
                    <td>Staff, RMU</td>
                    <td>84631</td>
                </tr>
                <tr id="hras" class="sh">
                    <td>SUPPLY OFFICER</td>
                    <td>Head, Supply and Property Unit</td>
                    <td>84620</td>
                </tr>
                <tr id="hras">
                    <td></td>
                    <td>Staff, SPU</td>
                    <td>84643</td>
                </tr>
                <tr id="hras">
                    <td></td>
                    <td>Warehouse Staff, HRAS</td>
                    <td>84681</td>
                </tr>
                <tr id="hras">
                    <td>JOSEFINA C. ALVAR</td>
                    <td>Administrative Assistant I</td>
                    <td>84629</td>
                </tr>
                <tr id="hras">
                    <td>MELANIE G. CASTILLON</td>
                    <td>Administrative Officer II (General Services)</td>
                    <td>84621</td>
                </tr>
                <tr id="hras" class="sh">
                    <td>AGNIESZKA HAZEL D. CANIGA</td>
                    <td>Head, Cash Unit</td>
                    <td>84619</td>
                </tr>
                <tr>
                    <td colspan="4" class="subheader">GUARD HOUSE</td>
                </tr>
                <tr>
                    <td>EDWIN A. ZAMORA</td>
                    <td>Security Guard II</td>
                    <td>84627</td>
                </tr>
                <tr id="cs">
                    <td colspan="4" class="subheader">CONSTRUCTION SECTION</td>
                </tr>
                <tr id="cs" class="sh">
                    <td>TERESITA D. LOON</td>
                    <td>Chief, Construction Section</td>
                    <td>84606</td>
                </tr>
                <tr id="cs">
                    <td></td>
                    <td>Secretary, Construction</td>
                    <td>84607</td>
                </tr>
                <tr id="cs">
                    <td></td>
                    <td>Staff, Construction</td>
                    <td>84684</td>
                </tr>
                <tr id="cs">
                    <td>MA. THERESA M. DAGUIPA</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84669</td>
                </tr>
                <tr id="cs">
                    <td>MARIA ROSARIO C. BASCONES</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84671</td>
                </tr>
                <tr id="cs">
                    <td>JEROME D. JUAN</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84672</td>
                </tr>
                <tr id="cs">
                    <td>ANSARODIN M. CONDAR</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84673</td>
                </tr>
                <tr id="cs">
                    <td>ROARK JAKE P. CAPILITAN</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84645</td>
                </tr>
                <tr id="cs">
                    <td>RALPH IAN D. DENQUE</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84670</td>
                </tr>
                <tr id="cs">
                    <td>RAY VINCENT J. CANLAS</td>
                    <td>Engineer II, Contract Management Unit</td>
                    <td>84644</td>
                </tr>
                <tr id="cs" class="sh">
                    <td>BALBINO G. CONCHA, III</td>
                    <td>Head, Monitoring Unit</td>
                    <td>84674</td>
                </tr>
                <tr id="ms">
                    <td colspan="4" class="subheader">MAINTENANCE SECTION</td>
                </tr>
                <tr id="ms" class="sh">
                    <td>REYNALDO A. CANLAS</td>
                    <td>Chief, Maintenance Section</td>
                    <td>84610</td>
                </tr>
                <tr id="ms">
                    <td></td>
                    <td>Secretary, Maintenance</td>
                    <td>84658</td>
                </tr>
                <tr id="ms">
                    <td></td>
                    <td>Staff, Maintenance</td>
                    <td>84611</td>
                </tr>
                <tr id="ms" class="sh">
                    <td>GLORIA R. CAINGCOY</td>
                    <td>Head, Maintenance Management Unit</td>
                    <td>84675</td>
                </tr>
                <tr id="ms" class="sh">
                    <td>WENCESLAO A. CAPILITAN, JR.</td>
                    <td>Head, Equipment Management Unit</td>
                    <td>84676</td>
                </tr>
                <tr id="ms" class="red">
                    <td>MARK ANTHONY Y. LATAWAN</td>
                    <td>Engineer II, Maintenance Management Unit</td>
                    <td>84646</td>
                </tr>
                <tr id="ms" class="red">
                    <td>CYVAE MAE T. ANTIVO</td>
                    <td>Engineer II, Maintenance Management Unit</td>
                    <td>84647</td>
                </tr>
                <tr id="ms" class="red">
                    <td>DIOMEDES M. GONZALES, JR.</td>
                    <td>Engineer II, Maintenance Management Unit</td>
                    <td>84648</td>
                </tr>
                <tr id="fs">
                    <td colspan="4" class="subheader">FINANCE SECTION</td>
                </tr>
                <tr id="fs" class="sh">
                    <td>ACCOUNTANT III</td>
                    <td>Chief, Finance Section</td>
                    <td>84614</td>
                </tr>
                <tr id="fs">
                    <td></td>
                    <td>Secretary, Finance</td>
                    <td>84663</td>
                </tr>
                <tr id="fs">
                    <td></td>
                    <td>Staff, Finance</td>
                    <td>84634</td>
                </tr>
                <tr id="fs">
                    <td>GENINA G. DENQUE</td>
                    <td>Administrative Assistant III (Sr. Bookkeeper)</td>
                    <td>84649</td>
                </tr>
                <tr id="fs" class="sh">
                    <td>LAMBERTO O. MORDENO</td>
                    <td>Head, Accounting Unit</td>
                    <td>84615</td>
                </tr>
                <tr id="fs">
                    <td></td>
                    <td>Staff, AU</td>
                    <td>84683</td>
                </tr>
                <tr id="fs" class="sh">
                    <td>EMMA J. LABAYEN</td>
                    <td>Head, Budget Unit</td>
                    <td>84616</td>
                </tr>
                <tr id="fs">
                    <td></td>
                    <td>Staff, BU</td>
                    <td>84682</td>
                </tr>
                <tr id="pds">
                    <td colspan="4" class="subheader">PLANNING AND DESIGN SECTION</td>
                </tr>
                <tr id="pds" class="sh">
                    <td>GRACE T. CURAYAG</td>
                    <td>Chief, Planning and Design Section</td>
                    <td>84608</td>
                </tr>
                <tr id="pds">
                    <td></td>
                    <td>Secretary</td>
                    <td>84609</td>
                </tr>
                <tr id="pds" class="sh">
                    <td>EBONY KIRSTIE C. ABOGADO</td>
                    <td>Head, Planning Unit</td>
                    <td>84667</td>
                </tr>
                <tr id="pds" class="sh">
                    <td>RYAN JOY L. BASCO</td>
                    <td>Head, Highways Design Unit</td>
                    <td>84665</td>
                </tr>
                <tr id="pds">
                    <td></td>
                    <td>Staff, PDS</td>
                    <td>84638</td>
                </tr>
                <tr id="pds" class="sh">
                    <td>RONELO ANTHONY P. SARCEDA</td>
                    <td>Head, Bridges and Other Public Works Design Unit</td>
                    <td>84666</td>
                </tr>
                <tr id="pds">
                    <td>EMELIANO B. VILLOCIDO, JR.</td>
                    <td>Architect II</td>
                    <td>84637</td>
                </tr>
                <tr id="pds" class="sh">
                    <td>GINALYN L. CULTURA</td>
                    <td>Head, Environmental, Social, and ROW Unit</td>
                    <td>84664</td>
                </tr>
                <tr id="pds">
                    <td>ROSEMARIE A. ELORTA</td>
                    <td>RROW Agent</td>
                    <td>84668</td>
                </tr>
                <tr id="coa">
                    <td colspan="4" class="subheader">COA</td>
                </tr>
                <tr id="coa" class="sh">
                    <td>DIAMOND SACAR OTTO</td>
                    <td>State Auditor IV, Audit Team Member</td>
                    <td>84625</td>
                </tr>
                <tr id="coa" class="red">
                    <td></td>
                    <td>Secretary</td>
                    <td>84639</td>
                </tr>
                <tr id="qas">
                    <td colspan="4" class="subheader">QUALITY ASSURANCE SECTION</td>
                </tr>
                <tr id="qas" class="sh">
                    <td>ROLITO P. PANCITO</td>
                    <td>Chief, Quality Assurance Section</td>
                    <td>84612</td>
                </tr>
                <tr id="qas">
                    <td></td>
                    <td>Secretary</td>
                    <td>84613</td>
                </tr>
                <tr id="qas">
                    <td>LAARNI D. DE LOS SANTOS</td>
                    <td>Engineer II, Materials Testing Unit</td>
                    <td>84677</td>
                </tr>
                <tr id="qas" class="red">
                    <td>JENNY LYN S. YU</td>
                    <td>Laboratory Technician II, QAS Laboratory</td>
                    <td>84635</td>
                </tr>
                <tr id="qas" class="red">
                    <td>RICHARD L. CUARTERON</td>
                    <td>Engineer II, Quality Implementing Unit (Asphalt)</td>
                    <td>84680</td>
                </tr>
                <tr id="qas">
                    <td>ROLAND A. DUNCANO</td>
                    <td>Miscellaneous Testing Room</td>
                    <td>84679</td>
                </tr>
                <tr id="qas">
                    <td>JANNAH LYN M. GRANA</td>
                    <td>Laboratory Technician I, Quality Implementing Unit (Misc.)</td>
                    <td>84636</td>
                </tr>
                <tr id="r13">
                    <td colspan="4" class="subheader">ICTS Region 13</td>
                </tr>
                <tr id="r13" class="sh">
                    <td>Michelle J. Jumawid</td>
                    <td>Regional IT Support Officer</td>
                    <td>82241</td>
                </tr>
                <tr id="r13" class="">
                    <td>Mark Philip P. Naman</td>
                    <td>District IT Support Officer (Bislig)</td>
                    <td>84444</td>
                </tr>
                <tr id="r13" class="">
                    <td>Mark Gerald O. Ostique</td>
                    <td>District IT Support Officer (Kara-os)</td>
                    <td>83406</td>
                </tr>
                <tr id="r13" class="">
                    <td>Marc Jude G. Sanchez</td>
                    <td>District IT Support Officer (Patin-ay)</td>
                    <td>83225</td>
                </tr>
                <tr id="r13" class="">
                    <td>Novo Caesar D. Ensalada</td>
                    <td>District IT Support Officer (Norte)</td>
                    <td>83000</td>
                </tr>
                <tr id="r13" class="">
                    <td>Davy Joan B. Escutin</td>
                    <td>District IT Support Officer (Dapa)</td>
                    <td>83820</td>
                </tr>
                <tr id="r13" class="">
                    <td>Sherwin M. Cantero</td>
                    <td>District IT Support Officer (Surigao City)</td>
                    <td>83625</td>
                </tr>
                <tr id="r13" class="">
                    <td>Richard A. Longakit</td>
                    <td>District IT Support Officer (Dinagat)</td>
                    <td>85030</td>
                </tr>
                <tr id="r13" class="">
                    <td></td>
                    <td>District IT Support Officer (Tandag)</td>
                    <td>84211</td>
                </tr>
            </tbody>
        </table>
    </div>
        <h3 class="mt-2 text-center"><b>TRUNKLINES</b></h3>
        <div class="striped-table tableFixHead2 card">
            <table>
                <thead>
                    <tr>
                        <th>DPWH Butuan City DEO TELEPHONE PROVIDERS</th>
                        <th>AREA CODE</th>
                        <th>NUMBERS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>[PLDT] Philippine Long Distance Telephone</td>
                        <td>(085)</td>
                        <td>225 - 2022</td>
                    </tr>
                    <tr>
                        <td>[PLDT] Philippine Long Distance Telephone</td>
                        <td>(085)</td>
                        <td>815 - 3971</td>
                    </tr>
                    <tr>
                        <td>[PLDT] Philippine Long Distance Telephone</td>
                        <td>(085)</td>
                        <td>815 - 3972</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-2 text-white">
        <p>NOTE: <b>To make outgoing calls, just press "9" + the seven digit number you want to call.</b></p>
    </div>
    <script>
        // Function to show loading spinner
        function showLoadingSpinner() {
            document.getElementById("loadingSpinner").style.display = "block";
        }

        // Function to hide loading spinner
        function hideLoadingSpinner() {
            document.getElementById("loadingSpinner").style.display = "none";
        }

        // Function to perform search
        function searchTable() {
            showLoadingSpinner(); // Show loading spinner

            // Simulate a delay (you can replace this with your actual search logic)
            setTimeout(function () {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                table = document.querySelector(".striped-table table");
                tr = table.getElementsByTagName("tr");

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
                                break; // Break out of the loop if a match is found
                            } else {
                                tr[i].style.display = "none";
                                tr[i].classList.remove("highlight");
                            }
                        }
                    }
                }
                hideLoadingSpinner(); // Hide loading spinner after search is complete
            }, 1000); // Replace 1000 with the actual delay you want
            return false; // Prevent the form from submitting
        }

        // Add an event listener to the search input field to trigger search on input
        document.getElementById("search").addEventListener("input", searchTable);
    </script>
    
</body>
</html>
