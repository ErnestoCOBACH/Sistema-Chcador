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
                  <img src="../IMG/logoSitio.png" class="rounded" alt="...">
                </div>
                <br>
                <?php
                    session_start();
                    $varsesion=$_SESSION['USUARIO'];
                    //$Rol=$_SESSION['Id_empleado'];
                    if ($varsesion == null || $varsesion="") {
                        header("location:../index.php");
                        die();
                    }
                ?>
                <div class="form-outline form-white mb-4">
                    <h3>Cambio de contraseña</h3>
                    <label class="form-label" for="typePasswordX" style="color: #000;">Correo: <?php echo $_SESSION['USUARIO']; ?></label>
                </div>

                <div class="form-outline form-white mb-4">
                <?php
                    //$Rol=$_SESSION['Id_empleado'];
                    $varsesion=$_SESSION['USUARIO'];
                    if ($varsesion == null || $varsesion="") {
                        header("location:../index.php");
                        die();
                    }
                    include 'conexion.php';

                    if (!empty($_POST['btn_Iniciar'])) {
                        if (empty($_POST['Contraseña']) || empty($_POST['ContraseñaConf'])) {
                            echo "<div class='alert alert-danger'>Campos están vacíos</div>";
                        } else {
                            $correo=$_SESSION['USUARIO'];
                            $Contraseña = $_POST['Contraseña'];
                            $ContraseñaConf = $_POST['ContraseñaConf'];

                            if($Contraseña==$ContraseñaConf){
                                $sql = $mysqli->query("CALL P_EditarContraseña('$correo','$Contraseña', '$ContraseñaConf');");
                                
                                header("location:../VISTAS/Home.php");
                                
                            }else{
                                echo "<div class='alert alert-danger'>Datos incorrectos</div>";
                            }

                                                
                            // Llamar al procedimiento almacenado
                            //$sql = $mysqli->query("CALL IniciarSesion('$Correo', '$Pass');");
                            
                            //if ($datos = $sql->fetch_object()) {
                            //    session_start();
                            //    $_SESSION['USUARIO'] = $Correo;
                    
                                
                            //    header("location:./VISTAS/Home.php");
                            //} else {
                            //    echo "<div class='alert alert-danger'>Datos incorrectos</div>";
                            //}
                        }
                    }



                ?>

                  <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Contraseña" name="Contraseña" required/>
                  <label class="form-label" for="typePasswordX" style="color: #000;">Contraseña</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Contraseña" name="ContraseñaConf" required/>
                  <label class="form-label" for="typePasswordX" style="color: #000;">Contraseña confirmar</label>
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