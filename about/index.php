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

    <title>About Us</title>
    <style>
      .navbar {
        background-color: #007bff; /* Bootstrap primary color */
        font-size: 18px;
      }    
      body {
        text-align: center;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        background-color: 	#05014a;
        color: #fff;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
      }
      .container {
        flex: 1;
      }
      .logo img {
        transition: transform 0.6s ease-in-out;
      }
      
      .logo img:hover {
        transform: scale(1.2);
      }
      .zoom {
        transition: transform 0.6s ease-in-out;
      }
      
      .zoom:hover {
        transform: scale(1.1);
      }
      
      .card {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
      }
      
      .card-header {
        background-color: #007bff;
        color: #fff;
        font-size: 24px;
      }
      
      .table {
        width: 100%;
      }
      .card-img-top {
        height: 200px;
        width: 200px;
      }
      footer {
        background-color: #343a40;
        color: #fff;
        margin-top: auto;
      }
      
      .card-body {
        text-align: left;
      }
      td {
        text-align: left;
      }
      .table-container {
        max-height: 600px; /* Set a maximum height for the table container */
        margin-bottom: 20px; /* Add some margin at the bottom */
      }
      
      .table {
        width: 100%;
        margin-bottom: 0; /* Remove margin from the table */
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-light mb-2">
      <div class="container-fluid">
        <a class="navbar-brand" href="../">
          <img src="../images/dpwh_logo.png" alt="DPWH Logo" width="30" height="30" class="">
          DPWH Butuan City District Engineering Office
        </a>
      </div>
    </nav>
    <div class="container">
        <div class="card mt-4 table-container">
            <div class="card-body">
                <table class="table">
                  <tbody>
                    <tr>
                      <th>Office:</th>
                      <td>Butuan City District Engineering Office</td>
                    </tr>
                    <tr>
                      <th>Office Address:</th>
                      <td>R. Palma, Butuan City</td>
                    </tr>
                    <tr>
                      <th>District Engineer:</th>
                      <td><b>DE JOSE CAESAR A. RADAZA</b></td>
                    </tr>
                    <tr>
                      <th>District Engineer Contact No.:</th>
                      <td>(085) <b>815-3971</b> local. <b>84601</b></td>
                    </tr>
                    <tr>
                      <th>District Engineer Email Address:</th>
                      <td><a href="mailto:radaza.jose_caesar@dpwh.gov.ph">radaza.jose_caesar@dpwh.gov.ph</a></td>
                    </tr>
                    <tr>
                      <th>Asst. District Engineer:</th>
                      <td><b>ADE GRACE T. CURAYAG (OIC)</b></td>
                    </tr>
                    <tr>
                      <th>Asst. District Engineer Contact No.:</th>
                      <td>(085) <b>815-3971</b> local. <b>84603</b> </td>
                    </tr>
                    <tr>
                      <th>Asst. District Engineer Email Address:</th>
                      <td><a href="mailto:curayag.grace@dpwh.gov.ph">curayag.grace@dpwh.gov.ph</a></td>
                    </tr>
                    <tr>
                      <th>Region:</th>
                      <td>Region XIII</td>
                    </tr>
                    <tr>
                      <th>Sort Order:</th>
                      <td>4</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
    </div>
  </body>
  <footer class="text-light ">
    <div class="container">
      <p>&copy; 2024 DPWH Butuan City District Engineering Office. All rights reserved.</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
