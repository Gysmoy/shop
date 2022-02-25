<?php
$version = uniqid(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administración | Configuración</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/vendors/dragula/dragula.min.css">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo $version; ?>">
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <style>
    .profile-picture {
      display: block;
      margin: auto;
      margin-bottom: 20px;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      border: 1px solid #2A3038;
      object-fit: cover;
      -object-fit: cover;
      object-position: center center;
      -object-position: center center;
    }

    #sn_edit,
    #sn_delete {
      opacity: 0;
      visibility: hidden;
      position: absolute;
      /* border-radius: 50px; */
      /* border: none; */
      box-shadow: 0 0 10px #000;
      transition: .25s;
    }

    #sn_edit {
      top: 50%;
      left: calc(50% - 20px);
      transform: translate(-50%, -50%);
    }

    #sn_delete {
      top: 50%;
      right: calc(50% - 20px);
      transform: translate(50%, -50%);
    }

    .social_network {
      cursor: move;
    }

    .social_network:hover>#sn_edit,
    .social_network:hover>#sn_delete {
      visibility: visible;
      opacity: 1;
    }
  </style>
</head>

<body class="boxed-layout">
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <?php include_once 'assets/php/navbar.php'; ?>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <?php include_once 'assets/php/header.php'; ?>
      </nav>
      <!-- INICIO MODALS -->
      <div class="modal" id="profile-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar foto de perfil</h5>
              <button type="button" class="close" data-bs-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body text-center">
              <img class="profile-picture" session="user_image" src="assets/php/image.php?id=undefined" alt="image" width="100%">
              <label for="profile-input" class="btn btn-primary">
                <i class="mdi mdi-upload"></i>
                Subir una foto
              </label>
              <input style="display: none;" type="file" id="profile-input" accept="image/*">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success profile-btn" disabled>Actualizar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" id="social_network_modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agrega una red social de contacto</h5>
              <button type="button" class="close" data-bs-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-0">
                <label>TIPO RED SOCIAL / DESCRIPCIÓN RED SOCIAL</label>
                <div class="input-group">
                  <select class="form-control js-example-basic-single select2-hidden-accessible" id="sn_id" style="width: 40%" required></select>
                  <input type="url" class="form-control" id="sn_value" style="width: 60%">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success">Guardar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <!-- INICIO MODALS -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CONFIGURACIÓN DE PERFIL</h4>
                  <div class="row portfolio-grid">
                    <div class="col-12">
                      <figure class="effect-text-in">
                        <img session="user_image" src="assets/php/image.php?id=undefined" alt="image">
                        <figcaption>
                          <h4 session="user_name"></h4>
                          <p onclick="updateProfile()">Haga click para cambiar de imagen</p>
                        </figcaption>
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CONFIGURACIÓN</h4>
                  <div class="mt-4">
                    <div class="accordion" id="accordion" role="tablist">
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-1">
                          <h6 class="mb-0">
                            <a data-bs-toggle="collapse" href="#user-data" aria-expanded="true" aria-controls="collapse-1" class=""> CONFIGURACIÓN DE USUARIO </a>
                          </h6>
                        </div>
                        <div id="user-data" class="collapse show" role="tabpanel" aria-labelledby="heading-1" data-bs-parent="#accordion">
                          <div class="card-body">
                            <form class="mt-2">
                              <div class="form-group">
                                <label for="user.username">Nombre de usuario</label>
                                <input type="text" class="form-control" id="user.username" placeholder="Ingrese un nombre de usuario" required>
                              </div>
                              <div class="form-group">
                                <label for="user.email">Correo electrónico</label>
                                <input type="email" class="form-control" id="user.email" placeholder="Ingrese un correo electrónico" required>
                              </div>
                              <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-2">
                          <h6 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#personal-data" aria-expanded="false" aria-controls="collapseTwo"> CONFIGURACIÓN DE DATOS </a>
                          </h6>
                        </div>
                        <div id="personal-data" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-bs-parent="#accordion">
                          <div class="card-body">
                            <form class="mt-2">
                              <div class="form-group">
                                <label for="user.name">Primer Nombre / Primer Apellido</label>
                                <input type="text" class="form-control" id="user.name" placeholder="Ingrese un nombre y un apellido" required>
                              </div>
                              <div class="form-group">
                                <label for="user.phone">Teléfono de contacto</label>
                                <input type="tel" class="form-control" id="user.phone" placeholder="Ingrese un teléfono celular" required>
                              </div>
                              <div class="form-group">
                                <label for="user.address">Dirección de domicilio</label>
                                <input type="text" class="form-control" id="user.address" placeholder="Ingrese una dirección" required>
                              </div>
                              <button type="submit" class="btn btn-primary me-2">Actualizar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-3">
                          <h6 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#social-network" aria-expanded="false" aria-controls="collapse-3"> REDES SOCIALES DE CONTACTO </a>
                          </h6>
                        </div>
                        <div id="social-network" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-bs-parent="#accordion">
                          <div class="card-body">
                            <p>
                              Arrastra tus redes según frecuencia de uso.
                              Queremos saber que redes usas más para
                              poder contactarte mas rápido.
                            </p>
                            <button id="sn_add" class="btn btn-inverse-primary">
                              Agregar
                            </button>
                            <button id="sn_save" class="btn btn-inverse-info" style="display: none;">
                              Guardar
                            </button>
                            <hr>
                            <div class="col-md-12">
                              <div id="social_network">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="footer">
          <?php
          include_once 'assets/php/footer.php';
          ?>
        </footer>
      </div>
    </div>
  </div>
  <!-- Vendors -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/dragula/dragula.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/dragula.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <script src="../assets/js/moment.min.js"></script>
  <script src="assets/js/session.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/account.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/profile.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/social_network.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/main.js?v=<?php echo $version; ?>"></script>
  <!-- End custom js for this page -->
</body>

</html>