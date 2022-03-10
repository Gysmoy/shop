<?php
$version = uniqid(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Administración | Configuración</title>
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/vendors/dragula/dragula.min.css">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo $version; ?>">
  <style>
    img {
      object-fit: cover;
      -object-fit: cover;
      object-position: center center;
    }

    #profile-canvas {
      width: max-content;
      display: block;
      margin: auto;
      margin-bottom: 20px;
    }

    #profile-picture {
      display: block;
      background-color: #ffffff;
      width: 250px;
      height: 250px;
      border-radius: 50%;
      border: 1px solid #2A3038;
      object-fit: cover;
      -o-object-fit: cover;
      object-position: center center;
      -o-object-position: center center;
    }

    #profile-picture.to-upload {
      border-radius: 0;
      border: none;
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
      <div id="profile-watcher" class="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">VER FOTO DE PERFIL</h5>
              <button type="button" class="close" data-bs-dismiss="modal">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body p-0">
              <img session="user_image" class="rounded" src="../api/admin/image/mini/undefined" alt="image" width="100%">
            </div>
          </div>
        </div>
      </div>
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
              <div id="profile-canvas">
                <img id="profile-picture" session="user_image_full" src="../api/admin/image/mini/undefined" alt="image" onload="setCanvas()">
              </div>
              <label for="profile-input" class="btn btn-primary">
                <i class="mdi mdi-upload"></i>
                Subir una foto
              </label>
              <input style="display: none;" type="file" id="profile-input" accept="image/png,image/jpeg,image/jpg,image/svg+xml">
            </div>
            <div class="modal-footer">
              <button id="profile-save" type="button" class="btn btn-success" disabled>Actualizar</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal" id="password-modal">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <div class="form-group mb-0">
                <label for="password-confirmation">INGRESE SU CONTRASEÑA</label>
                <input type="password" class="form-control" id="password-confirmation" placeholder="">
              </div>
            </div>
            <div class="modal-footer">
              <button id="password-confirm" onclick="" type="button" class="btn btn-primary">Confirmar</button>
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
              <input type="hidden" id="sn_position" value="">
              <div class="form-group mb-0">
                <label>TIPO RED SOCIAL / DESCRIPCIÓN RED SOCIAL</label>
                <div class="input-group">
                  <select id="sn_id" class="form-control" style="width: 40%" required></select>
                  <input id="sn_value" class="form-control" style="width: 60%" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button id="sn_new" class="btn btn-success">Guardar</button>
              <button class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
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
                  <h4 class="card-title text-center">CONFIGURACIÓN DE PERFIL</h4>
                  <div class="row portfolio-grid">
                    <div class="col-12" style="width: max-content; margin:auto">
                      <figure class="effect-text-in">
                        <img session="user_image_full" src="../api/admin/image/mini/undefined" class="rounded" alt="image" onerror="profile_button(false)" oncanplay="profile_button(true)">
                        <figcaption>
                          <h4 session="user_name"></h4>
                          <p id="profile-update">Haga click para cambiar de imagen</p>
                        </figcaption>
                      </figure>
                    </div>
                  </div>
                  <div class="dropdown text-center">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuIconButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-account"></i>
                      Perfil
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton6">
                      <h6 class="dropdown-header">¿Qué deseas hacer?</h6>
                      <a class="dropdown-item" id="profile-watch">
                        <i class="mdi mdi-crop-free"></i>
                        Ver foto
                      </a>
                      <a class="dropdown-item" id="profile-download">
                        <i class="mdi mdi-download"></i>
                        Descargar foto
                      </a>
                      <a class="dropdown-item" id="profile-upload">
                        <i class="mdi mdi-upload"></i>
                        Subir una foto
                      </a>
                      <a class="dropdown-item" id="profile-delete">
                        <i class="mdi mdi-delete-forever"></i>
                        Quitar foto
                      </a>
                    </div>
                  </div>
                  <hr>
                  <h4 class="card-title text-center">¿CÓMO TE VEN LOS DEMÁS?</h4>
                  <div class="d-flex flex-row" style="justify-content: center;">
                    <img session="user_image" src="../api/admin/image/mini/undefined" class="img-lg rounded" alt="image">
                    <div class="ms-3">
                      <h6 session="user_username"></h6>
                      <p session="rol_name" class="text-muted my-1"></p>
                      <p session="ip_client" class="mt-1 text-success"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CONFIGURACIÓN</h4>
                  <p class="text-muted">* Requiere confirmación por contraseña</p>
                  <div class="mt-4">
                    <div class="accordion" id="accordion" role="tablist">
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-1">
                          <h6 class="mb-0">
                            <a data-bs-toggle="collapse" href="#user-data" aria-expanded="true" aria-controls="collapse-1" class=""> CONFIGURACIÓN DE USUARIO *</a>
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
                            <a class="collapsed" data-bs-toggle="collapse" href="#user-pass" aria-expanded="false" aria-controls="collapse-2"> CONFIGURACIÓN DE CONTRASEÑA *</a>
                          </h6>
                        </div>
                        <div id="user-pass" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-bs-parent="#accordion">
                          <div class="card-body">
                            <form class="mt-2" autocomplete="off">
                              <div class="form-group">
                                <label for="user.password">Nueva contraseña</label>
                                <input type="password" class="form-control" id="user.password" pass="1" placeholder="Ingrese una contraseña" required>
                              </div>
                              <div class="form-group mb-0">
                                <label for="user.password">Repita la nueva contraseña</label>
                                <input type="password" class="form-control" id="user.password" pass="2" placeholder="Repita la nueva contraseña" required>
                              </div>
                              <button type="submit" class="btn btn-primary mt-3" style="display: none;">Actualizar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-3">
                          <h6 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#personal-data" aria-expanded="false" aria-controls="collapse-3"> CONFIGURACIÓN DE DATOS *</a>
                          </h6>
                        </div>
                        <div id="personal-data" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-bs-parent="#accordion">
                          <div class="card-body">
                            <p>Requerimos este dato para poder contactarnos con usted en caso sea necesario.</p>
                            <form class="mt-2">
                              <div class="form-group">
                                <label for="user.name">Primer Nombre / Primer Apellido</label>
                                <input type="text" class="form-control" id="user.name" placeholder="Ingrese un nombre y un apellido" required>
                              </div>
                              <div class="form-group">
                                <label for="user.phone">Teléfono de contacto</label>
                                <input type="tel" class="form-control has-error" id="user.phone" placeholder="Ingrese un teléfono celular" required>
                              </div>
                              <div class="form-group mb-0">
                                <label for="user.address">Dirección de domicilio</label>
                                <input type="text" class="form-control" id="user.address" placeholder="Ingrese una dirección" required>
                              </div>
                              <button type="submit" class="btn btn-primary mt-3" disabled style="display: none;">Actualizar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" role="tab" id="heading-4">
                          <h6 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#social-network" aria-expanded="false" aria-controls="collapse-4"> REDES SOCIALES DE CONTACTO </a>
                          </h6>
                        </div>
                        <div id="social-network" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-bs-parent="#accordion">
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
  <script src="assets/js/util/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/util/off-canvas.js"></script>
  <script src="assets/js/util/hoverable-collapse.js"></script>
  <script src="assets/js/util/misc.js"></script>
  <script src="assets/js/util/settings.js"></script>
  <script src="assets/js/util/todolist.js"></script>
  <script src="assets/js/util/dragula.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../assets/js/moment.min.js"></script>
  <script src="../assets/js/html2canvas.js"></script>
  <script src="../assets/js/notify.min.js"></script>
  <script src="assets/js/general/loading.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/general/session.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/profile.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/account.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/password.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/personalData.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/social_network.js?v=<?php echo $version; ?>"></script>
  <script src="assets/js/account/main.js?v=<?php echo $version; ?>"></script>
  <!-- End custom js for this page -->
</body>

</html>