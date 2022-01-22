<?php

$version = uniqid();
include_once '../../assets/php/session.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administración | Inicio</title>
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="../vendors/owl-carousel-2/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/style.css?v=<?php /*echo $version;*/ ?>">
  <link rel="shortcut icon" href="../images/favicon.png" />
</head>

<body class="boxed-layout">
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?php
     include_once '../../assets/php/navbar.php';
      ?>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <?php
        include_once '../../assets/php/header.php';
        ?>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
          <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body" >
                    <h2 class="card-title text-md-center mb-5">Termine de rellenar sus datos para una mejor atencion</h2>
                    <form id="example-form" action="#">
                    <div class="content clearfix p-5 ">
                        <h3  class="title current">Account</h3>
                        <section  role="tabpanel" class="body current row col-12">
                          <div class="form-group  col-lg-6   ">
                            <label>Email</label>
                            <input type="email" class="form-control"  placeholder="Ingese su contraseña email">
                          </div>
                          <div class="form-group col-lg-6    ">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Password">
                          </div>
                          <div class="form-group col-lg-6  ">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm password">
                          </div>
                        </section>
                       
                      </div>
                     
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/user-relation.js"></script>
  <!-- End custom js for this page -->
</body>

</html>