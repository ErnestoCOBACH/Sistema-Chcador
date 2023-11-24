<!DOCTYPE html>
<html lang="es" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COBACH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(0, 132, 116, 255), rgba(50, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(0, 132, 116, 255), rgba(22, 144, 69, 255))
            }
        
            
    </style>
    <link rel="shortcut icon" href="img/logob.png">


    <!-- Todo lo relaconado con la pwa -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script> 
    <script src="main.js"></script>
    <!-- iconos -->
    <link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
    <!-- Manifest -->
    <link rel="manifest" href="manifest.json" crossorigin="use-credentials">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


</head>
<body>
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-3 col-xl-4">
        <div class="card bg text-white" style="border-radius: 2rem;">
          <div class="card-body p-4-5 text-center">
           <form method="post" action="" name="signup-form" style=" color: #000;">
                <div class="mb-md-10 mt-md-10 pb-10">
                <br>
                <div class="text-center">
                  <img src="IMG/logoSitio.png" class="rounded" alt="...">
                </div>
                <br>

                <div class="form-outline form-white mb-4">
                   <?php
                    
                    include 'PHP/InicioSecion.php';
                  ?> 
                  <input type="email" id="Correo" class="form-control form-control-lg" placeholder="Correo" name="Correo" />
                  <label class="form-label" for="typeEmailX" style="color: #000;">Correo</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Contraseña" name="Pass" />
                  <label class="form-label" for="typePasswordX" style="color: #000;">Contraseña</label>
                </div>
                <input type="submit" class="btn btn-success btn-lg px-5"  value="Entrar" name="btn_Iniciar">

              </div>
             </form>
            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>