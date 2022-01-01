<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mozo en línea | Login usuario</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free Website Template" name="keywords">
  <meta content="Free Website Template" name="description">

  <!-- Favicon -->
  <link href="../img/favicon.ico" rel="icon">
  <link rel="stylesheet" href="../page/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../page/assets/css/vendor.bundle.base.css">

  <!-- Google Font -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet">

  <!-- CSS Libraries -->
  <!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="./lib/animate/animate.min.css" rel="stylesheet">
  <link href="./lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/login-singup.css">
</head>

<body>
  <div class="container">
    <div class="col-md-6 grid-margin stretch-card">


      <div class="conenedor-form card p-2">
        <div class="card-body">

          <form>
            <a href="../../index.php"><img class="logo" src="../img/shop.svg" alt="logo"></a>
            <div class="mb-3 mt-5 text-center">
              <h4>Mozo en linea | Cliente</h4>
              <h6>Iniciar sesíon</h6>
            </div>

            <div class="row">
              <div class="col-md-12 mb-1">
              <button id="init-session-facebook" class="btn init-session-btn"> <img
                  src="../img/facebook_icon-icons.svg " class=" icon-init-session" alt="icon facebook">
                <p class="text-init-facebook">Iniciar sesíon con Facebook</p>
              </button>
              </div>

              <div class="col-md-12 mb-3">
              <button id="init-session-google" class="btn init-session-btn"> <img src="../img/google_icon-icons.svg"
                  class=" icon-init-session" alt="icon google">
                <p class="text-init-google">Iniciar sesíon con Google</p>
              </button>
              </div>

              <hr>

              <div class="col-md-12">
                <div class="mb-1">
                  <label class="form-label label-form-login" for="">Correo electrónico / usuario</label>
                  <input id="email" class="form-control" type="text" placeholder="Correo elecrónico o usuario">
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-1">
                  <label class="form-label label-form-login" for="">Contraseña</label>
                  <input id="pass" class="form-control" type="password" placeholder="********">
                </div>
              </div>

              <div id="contVer" class="col-md-12">
                <div class="mb-1">
                  <label class="form-label label-form-login" for="">Codigo de verificasion</label>
                  <input id="verCod" class="form-control" type="password" placeholder="00000000">
                </div>
              </div>

              <div class="label-form-login">
                <p>Aun no tengo una cuenta <a href="#">deseo tegistrarme</a></p>
              </div>
              <div class="col-md-12">
                <div class="mb-1">
                  <button id="init-session-shop" class="btn">Iniciar sesíon</button>
                </div>
              </div>

            </div>

           

            
            
            

            
            <div>


            </div>

          </form>
        </div>

      </div>

    </div>
  </div>

  <div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"></script>
    <script src="../js/login_src.js"></script>

  </div>

</body>

</html>