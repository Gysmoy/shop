<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Mozo en línea | Registro empresa</title>
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


  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/login-singup.css">
</head>

<body>
  <div class="container">
    <div class="col-md-6 grid-margin stretch-card">


      <div class="conenedor-form em-reg  card p-2">
        <div class="card-body">

          <form>
            <a href="../../index.php"><img class="logo" src="../img/shop.svg" alt="logo"></a>
            <div class="mb-3 mt-5 text-center">
              <h4>Mozo en linea | Empresa</h4>
              <h6>Registrar empresa</h6>
            </div>

            <section id="form1-empresa">
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-2 mt-3">
                    <label class="form-label label-form-login" for="name-business">Nombre de la empresa</label>
                    <input id="name-business" class="form-control" type="text" placeholder="Nombre de la empresa">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-2 mt-3">
                    <label class="form-label label-form-login" for="address-business">Ubicación de la empresa</label>
                    <input id="address-business" class="form-control" type="text" placeholder="Ubicación de la empresa">
                  </div>
                </div>
                <div class="label-form-login">
                  <p>Ya tengo una cuenta <a href="#">deseo iniciar sesíon</a></p>
                </div>

                <div class="col-md-12">
                  <div class="mb-4">
                    <button  id="btn-sig1" class="btn btn-success btn-singup">Siguiente</button>
                  </div>
                </div>

              </div>
             
              
              
              
            </section>

            <section id="form2-empresa" style="display: none;">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="name-gerente">Nombres</label>
                    <input id="name-gerente" class="form-control" type="text" placeholder="Nombres">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1 ">
                    <label class="form-label label-form-login" for="surname-gerente">Apellidos</label>
                    <input id="surname-gerente" class="form-control" type="text" placeholder="Apellidos">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="dni-gerente">DNI</label>
                    <input id="dni-gerente" class="form-control" type="text" placeholder="DNI">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="phone-gerente">Telefono / celular</label>
                    <input id="phone-gerente" class="form-control" type="text" placeholder="Telefono">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="email-gerente">Email</label>
                    <input id="email-gerente" class="form-control" type="text" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="img-gerente">Imagen de perfil</label>
                    <input id="img-gerente" class="form-control" type="file" placeholder="Suba una imagen para su perfil">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="pass">Contraseña</label>
                    <input id="pass" class="form-control" type="password" placeholder="********">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-1">
                    <label class="form-label label-form-login" for="pass2">Confirmar contraseña</label>
                    <input id="pass2" class="form-control" type="password" placeholder="********">
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6 mt-2">
                  <button type="submit" id="btn-atras" class="btn btn-danger btn-singup">Atras</button>
                </div>
                <div class="col-md-6 mt-2">
                  <button type="submit" id="btn-sig2" class="btn btn-success btn-singup">Siguiente</button>
                </div>
              </div>
            </section>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"></script>
    <script src="../js/singupempresa.js"></script>

  </div>

</body>

</html>