<?php
// Start the customer session
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portal-Customer</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

    <!--from purchase -->
    <link rel="stylesheet" type="text/css" href="/Entak/Portal/Purchase/css/nunito-font.css">
    <link rel="stylesheet" type="text/css" href="/Entak/Portal/Purchase/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="/Entak/Portal/Purchase/css/style.css"/>
    <!--from purchase -->
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Template Main CSS File -->
    <link href="/Entak/Portal/assets/css/style.css" rel="stylesheet">

    <script src="/Entak/assets/vendor/jquery/jquery-3.6.0.js"></script>
    <!-- Template Main JS File -->
  </head>
  <body id="mainBody">
    <!-- retrieve necessary data here -->
    <?php
      $_SESSION["user"]="user object here"
     ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2" id="sideBar">
          <div class="vstack mt-3 gap-3">
            <p class="text-success display-4">Entak</p>
            <div class="accordion accordion-flush" id="sideBarMenu">
              <div class="accordion-item">
                <h2 class="accordion-header" id="dashboardMenu">
                  <button type="button" id="dashboardBtn"
                  class=" btn text-success accordion-button collapsed"
                  data-bs-toggle="collapse" data-bs-target="#dashboardSubMenu">
                    <div class="d-flex justify-content-start">
                      <i class="bi bi-house"></i>
                      <span  class=" mx-3 ">
                        Dashboard
                      </span>
                    </div>
                  </button>
                </h2>
                <div id="dashboardSubMenu" class="accordion-collapse collapse"
                data-bs-parent="#sideBarMenu">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="invoiceMenu">
                  <button type="button" id="invoiceBtn"
                  class="btn accordion-button collapsed text-success"
                  data-bs-toggle="collapse" data-bs-target="#invoiceSubMenu">
                   <div class="d-flex justify-content-start">
                    <i class=" bi bi-receipt"></i>
                    <span  class="mx-3">
                      Invoice
                    </span>
                   </div>
                  </button>
                </h2>
                <div id="invoiceSubMenu" class="accordion-collapse collapse"
                 data-bs-parent="#sideBarMenu">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="meterMenu">
                  <button type="button" id="meterBtn"
                   class="btn accordion-button collapsed text-success"
                   data-bs-toggle="collapse" data-bs-target="#meterSubMenu">
                    <div class="d-flex justify-content-start">
                      <i class="bi bi-speedometer"></i>
                      <span  class="mx-3">
                        Smart Meter
                      </span>
                    </div>
                  </button>
                </h2>
                <div id="meterSubMenu" class="accordion-collapse collapse"
                data-bs-parent="#sideBarMenu">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="profileMenu">
                  <button type="button" id="profileBtn"
                   class="btn accordion-button collapsed text-success"
                   data-bs-toggle="collapse" data-bs-target="#profileSubMenu">
                    <div class="d-flex justify-content-start">
                      <i class="bi bi-person"></i>
                      <span  class="mx-3">
                        Profile
                      </span>
                    </div>
                  </button>
                </h2>
                <div id="profileSubMenu" class="accordion-collapse collapse"
                data-bs-parent="#sideBarMenu">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10" id="mainContent">

          <div id="head" class="d-flex justify-content-between p-2 my-3">
            <form class=" d-flex p-2">
              <div class="input-group input-group-sm">
                <button class="btn input-group-text border-success border-0"
                type="submit"><i class="bi bi-search"></i></button>
                <input type="text" class="form-control border-success ps-3
                rounded-pill" placeholder="Search here.." aria-label="Username"
                aria-describedby="">
              </div>
            </form>

              <div class=" d-flex p-2">
                <div class="align-self-center me-2">
                  <p class="badge mb-0 p-2 rounded-pill bg-dark">
                    <span class="text-success">Gas Price</span> : $<span>50</span>/kg
                  </p>
                </div>
                <button type="button" class="btn align-self-end position-relative me-2">
                  <i class="bi h5 bi-bell"></i>
                  <div class="position-absolute top-0 start-75 p-2 spinner-grow
                  spinner-grow-sm text-success">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </button>
                <button type="button" class="btn align-self-end position-relative me-2">
                  <i class="bi h5 bi-envelope"></i>
                  <div class="position-absolute top-0 start-75 p-2 spinner-grow
                  spinner-grow-sm text-success" >
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </button>
                <div class="align-self-center">
                  <i class="bi bi-person-circle h3"></i>
                </div>
              </div>
          </div>

          <div class="d-flex justify-content-between  p-3" id="pagination">
            <div>
              <p class="display-5 text-light">Dashboard</p>
              <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item "><a href="#" class="text-light">Customer</a></li>
                  <li class="breadcrumb-item "><a href="#" class="text-light">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page" class=""></li>
                </ol>
            </nav>
            </div>
            <div class="d-flex">
              <button type="button" class=" align-self-center text-secondary
               h-50 px-3 btn btn-light shadow">Generate Invoice</button>
            </div>
          </div>

          <div class="container-fluid d-flex justify-content-center">
            <button type="button" class="btn btn-primary" id="purchaseBtn">
              test Purchase
            </button>
          </div>



          <div class="container-fluid" id="purchase">
          </div>

          <div class="container-fluid" id="invoice">
          </div>

          <div class="container-fluid" id="smartMeter">
          </div>

          <div class="container-fluid" id="profile">
          </div>

        </div>
      </div>
    </div>
    <script src="/Entak/Portal/assets/js/customer.js"></script>
  </body>
</html>
