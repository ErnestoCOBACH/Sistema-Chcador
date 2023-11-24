<?php
  include 'Roles.php';
  //session_start();
  $varsesion=$_SESSION['USUARIO'];
  //$Rol=$_SESSION['Id_empleado'];
  if ($varsesion == null || $varsesion="") {
    header("location:../index.php");
    die();
  }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/templatemo-style.css">
    <link rel="shortcut icon" href="../img/logob.png">
    <title>Home</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .tm-footer {
            margin-top: auto;
        }
    </style>
</head>
<body >
    
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <div class="col-lg-12" style="background-color:#008474; background-image:url('../img/Background.jpg'); background-size: 100%;">
        <nav class="navbar navbar-expand-lg" >
            <div class="container-fluid" >
                <a class="navbar-brand" href="../VISTAS/Home.php">
                    <img src="../img/logo_res.png" alt="" style="width:180px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="myFunction()">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0" >
                    <?php  

                        if ( $_SESSION['NOMBRE_ROL']=='Admin'&& $_SESSION['ALTAS']==1 && $_SESSION['BAJAS']==1 && $_SESSION['CAMBIOS']==1) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" aria-current="page" href="Cargas.php">Cargar archivo</a>
                    </li>
                    <?php                         
                        } 
                    ?>

                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" aria-current="page" href="../PHP/CerrarSecion.php">Cerrar sesión:  <?php echo $_SESSION['USUARIO']; ?> </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-90 tm-gallery">
        <?php
            
            include 'conexion.php';
            $varsesion=$_SESSION['USUARIO'];
              //$Rol=$_SESSION['Id_empleado'];
              if ($varsesion == null || $varsesion="" ) {
                header("location:../index.php");
                die();
              }
              if (!($_SESSION['NOMBRE_ROL']=='Admin')) {
                header("location:../VISTAS/Home.php");
                die();
              }

            // Verificar si es una solicitud POST y si se ha enviado el dato CSV
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["csvData"])) {

                // Decodificar los datos CSV desde el JSON
                $csvData = json_decode($_POST["csvData"], true);


                // Verificar la conexión
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Iterar sobre los datos CSV y llamar al procedimiento almacenado para insertar en la base de datos
                foreach ($csvData as $index => $row) {
                    // Omitir la fila 0
                    if ($index === 0) {
                        continue;
                    }

                    $nombre = $row[2];
                    $apellido = $row[3];
                    $noTarjeta = $row[4];
                    $dispositivo = $row[5];
                    $puntoEvento = $row[6];
                    $verificacion = $row[7];
                    $estado = $row[8];
                    $evento = $row[9];
                    $notas = $row[10];
                    $noEmpleado = $row[11];
                    $categoria = $row[12];

                    $str = $row[0];

                    $arr1 = str_split($str);
                    $arr2 = str_split($str, 2);


                    //print_r($arr1[0]);
                    $dia=$arr1[0].$arr1[1];
                    $mes=$arr1[3].$arr1[4];
                    $año=$arr1[6].$arr1[7].$arr1[8].$arr1[9];
                    $hora=$arr1[11].$arr1[12].":".$arr1[14].$arr1[15];

                    // Llamar al procedimiento almacenado
                    $sqlAcciones = $mysqli->query("CALL P_InsertarRegistro('$nombre','$apellido','$noTarjeta','$dispositivo','$puntoEvento','$verificacion', '$estado', '$evento', '$notas', '$noEmpleado', '$categoria', '$dia', '$mes', '$año', '$hora');");


                }

                echo "<h2>Se registraron con exito!</h2>";

            } else {
              echo "<h2>Error de varga vuelve a intentarlo!</h2>";
            }
          ?>         


        </div>
    </div>

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="row">
            <center>
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright © 2023 Colegio de Bachilleres del Estado de Chihuahua
                </div>
            </center>
        </div>
    </footer>

    <script src="../js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
        
    </script>
    <script type="text/javascript">
        var Entra = new Boolean(false);
        function myFunction() {
            var currentScrollPos = window.pageYOffset;

            if(currentScrollPos === 0 && Entra == false) {
                document.getElementById("navbarSupportedContent").style.backgroundColor = "#008474";
                Entra=Boolean(true);

            } else {
                document.getElementById("navbarSupportedContent").style.backgroundColor = 'transparent';
                Entra=Boolean(false);
            }
        } 
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>