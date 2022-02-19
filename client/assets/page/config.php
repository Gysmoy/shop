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
  <link rel="stylesheet" href="../css/flag-icon.min.css">
  <link rel="stylesheet" href="../css/jquery-jvectormap.css">
  <link rel="stylesheet" href="../css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/style.css?v=<?php /*echo $version;*/ ?>">
  <link rel="shortcut icon" href="../images/favicon.png" />
  <link rel="stylesheet" href="../css/config.css">
</head>

<body class="boxed-layout">
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?php
     include_once '../../assets/page/navbar.php';
      ?>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <?php
        include_once '../../assets/page/header.php';
        ?>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CONFIGURACION DE USUARIO</h4>
                  <p class="card-description">Configure su usuario para un mejor cervicio</p>
                  <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="contenedor-datosPersonales-tab" data-bs-toggle="pill"
                        href="#contenedor-datosPersonales" role="tab" aria-selected="true">DATOS PERSONALES</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contenedor-email-tab" data-bs-toggle="pill" href="#contenedor-email"
                        role="tab" aria-selected="false">EMAIL</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contenedor-credenciales-tab" data-bs-toggle="pill"
                        href="#contenedor-credenciales" role="tab" aria-selected="false">CREDENCIALES</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="contenedor-datosPersonales">
                      <div class="media d-block content">
                        <form>
                          <div class="body current d-sm-flex">
                            <div class="col-md-4 content grid-margin stretch-card" id="cont-option-profile">
                              <div class="card">
                                <div class="card-body row">
                                  <div class="col-lg-12" id="cont-imge-profile">
                                    <img id="image-profile" src="../php/image.php?id=undefined" alt="profile">
                                  </div>
                                  <div class="cont-options mt-4 col-lg-12">
                                    <a class="icons" title="Subir fotografia" href=""><i class="mdi mdi-upload"></i></a>
                                    <a class="icons" title="Descargar fotografia" href=""><i
                                        class="mdi mdi-download"></i></a>
                                    <a class="icons" title="Ver fotografia" href=""><i class="mdi mdi-eye"></i></a>
                                    <!--a class="icons" title="Compartir perfil" href=""><i class="mdi mdi-share-variant"></i></a-->
                                    <a class="icons" title="Eliminar fotografia" href=""><i
                                        class="mdi mdi-delete"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-8 mt-3 content row">
                              <div class="form-group  col-lg-6 ">
                                <label>Nombres</label>
                                <input id="conf-names" type="text" class="form-control" placeholder="">
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Apellido paterno</label>
                                <input id="conf-primer-apellido" type="text" class="form-control" placeholder="">
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Apellido materno</label>
                                <input id="conf-segundo-apellido" type="text" class="form-control" placeholder="">
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Departamento</label>
                                <select class="form-control" name="" id="cbo-departamento"></select>
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Provincia</label>
                                <select class="form-control" name="" id="cbo-provincia"></select>
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Distrito</label>
                                <select class="form-control" name="" id="cbo-distrito"></select>
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Tipo calle</label>
                                <select class="form-control" name="" id="cbo-tipoCalle"></select>
                              </div>
                              <div class="form-group  col-lg-6 ">
                                <label>Calle</label>
                                <input id="conf-calle" type="text" class="form-control" placeholder="">
                              </div>
                              <div class="form-group col-lg-6">
                                <label>Redes Sociales</label>
                                <div id="social-networks">
                                  <!--div>
                                    <div id="add-social-network" class="badge  badge-pill badge-outline-success">+</div>
                                  </div-->


                                  <!--div>
                                    <div class="badge cont-icon-social badge-pill badge-succes" data-bs-toggle="modal" data-bs-target="#W-1">
                                      <i class="icons-social-icon mdi mdi-whatsapp"></i>
                                    </div>
                                    <div class="modal fade" id="W-1" tabindex="-1"
                                      aria-labelledby="ModalLabel" style="display: none;" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">RED SOCIAL WHATSAPP</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                              aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <form>
                                              <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Tipo de red social:</label>
                                                <select type="text" class="form-control" id="redSocialType"></select>
                                              </div>
                                              <div class="form-group">
                                                <label for="message-text" class="col-form-label">RED SOCIAL </label>
                                                <input type="text" class="form-control" id="redSocialDescription">
                                              </div>
                                            </form>
                                          </div>
                                          
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-success">Send message</button>
                                            <button type="button" class="btn btn-light"
                                              data-bs-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div-->



                                  

                                </div>
                              </div>
                              <div class="form-group col-lg-12">
                                <button type="button" id="submit-data-user"
                                  class="btn btn-success btn-fw form-group ">Aceptar</button>
                              </div>
                            </div>

                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="contenedor-email">
                      <div class="media d-block content ">
                        <div class="body current row clearfix">

                          <div class="form-group  col-lg-6   ">
                            <label>Nuebo email</label>
                            <input type="email" class="form-control" placeholder="Ingese su email">
                          </div>
                          <div class="form-group  col-lg-6   ">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Ingese su email">
                          </div>
                          <div class="form-group col-lg-3  ">
                            <button type="button" class="btn btn-success btn-fw form-group col-lg-12">Aseptar</button>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="tab-pane fade" id="contenedor-credenciales">
                      <div class="media d-block content clearfix  ">
                        <form action="">
                          <div class="body current row">

                            <div class="form-group col-lg-12    ">
                              <label>Contraseña actual</label>
                              <input type="password" class="form-control" placeholder="Ingrese su contraseña">
                            </div>

                            <div class="form-group col-lg-6    ">
                              <label>Nueba contraseña</label>
                              <input type="password" class="form-control" placeholder="Ingrese su contraseña">
                            </div>
                            <div class="form-group col-lg-6  ">
                              <label>Repita la contraseña</label>
                              <input type="password" class="form-control" placeholder="Repita la contraseña">
                            </div>
                            <div class="form-group col-lg-3  ">
                              <button type="button" class="btn btn-success btn-fw form-group col-lg-12">Aseptar</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/progressbar.js/progressbar.min.js"></script>
  <script src="../vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="../vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <script src="../js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/misc.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../js/dashboard.js"></script>
  <script src="../js/user-relation.js"></script>
  <!-- End custom js for this page -->
  <!-- PARTE DE LA PAGINA -->

  <script src="../js/select2.js"></script>
  <script src="../js/combos.js"></script>
  <script src="../js/general_config.js"></script>
  <script src="../js/config.js"></script>

</body>

</html>