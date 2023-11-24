
<?php
    include '../PHP/Roles.php';
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

    <!-- Todo lo relaconado con la pwa -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> 
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script> 
    <script src="main.js"></script>
    <!-- iconos -->
    <link rel="icon" type="image/png" sizes="192x192"  href="IMG/android-icon-192x192.png">
    <!-- Manifest -->
    <link rel="manifest" href="manifest.json" crossorigin="use-credentials">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
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
                <a class="navbar-brand" href="../Vista/Home.php">
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
                        <a class="nav-link nav-link-1 active" aria-current="page" href="../VISTAS/Cargas.php">Cargar archivo</a>
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
            <center>    
                <h1> Informacion cargada </h1>
                <h2>    </h2>
            </center>

            <form action="" name='signup-form' method="post" enctype="multipart/form-data">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" class="btn btn-success" value="Cargar" name="btn_Cargar">
                    <a href="../VISTAS/Cargas.php" class="btn btn-danger">No cargar</a>

                    
                </div>
            </form>

            <div class="table-responsive">
            <table class="table table-striped ">
				<thead class="table-dark">
			    	<tr>
			      		<th scope="col">#</th>
					    <th scope="col">Dia/Mes/Año</th>
					    <th scope="col">No. de empleado</th>
					    <th scope="col">Categoria</th>
					    <th scope="col">Nombre</th>
					    <th scope="col">Apellido</th>
					    <th scope="col">No. de tarjeta</th>
					    <th scope="col">Dispositivo</th>
					    <th scope="col">Punto de evento</th>
					    <th scope="col">Verificacion</th>
					    <th scope="col">Estado</th>
					    <th scope="col">Evento</th>
					    <th scope="col">Notas</th>

			    	</tr>
			  	</thead>
			  	<tbody>
			  		<?php
                        if (isset($_POST['btn_Iniciar'])) {
                            if ($_FILES['archivo']['error'] == 0) {
                                $nombreArchivo = $_FILES['archivo']['name'];
                                $tipoArchivo = $_FILES['archivo']['type'];
                                $rutaTemporal = $_FILES['archivo']['tmp_name'];

                                // Verifica si el archivo es un archivo CSV
                                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                                if (strtolower($extension) === 'csv') {
                                    // Abre el archivo CSV en modo lectura
                                    $file = fopen($rutaTemporal, 'r');

                                    // Verifica si el archivo se abrió correctamente
                                    if ($file) {
                                        // Almacena la fila 0 en una variable aparte
                                        $fila0 = fgetcsv($file, 100000, ";");
                                        $contador=1;
                                        while ($data = fgetcsv($file, 100000, ";")) {
                                            $num = count($data);

                                            // Separar la columna (sin contar la fila 0) por comas
                                            $ColumnaSeparada = explode(",", $data[0]);
                                            echo "<tr><th scope='row'>$contador</th>";
                                                echo "<td>".$ColumnaSeparada[0]."</td>";
                                                echo "<td>".$ColumnaSeparada[11]."</td>";
                                                echo "<td>".$ColumnaSeparada[12]."</td>";
                                                echo "<td>".$ColumnaSeparada[2]."</td>";
                                                echo "<td>".$ColumnaSeparada[3]."</td>";
                                                echo "<td>".$ColumnaSeparada[4]."</td>";
                                                echo "<td>".$ColumnaSeparada[5]."</td>";
                                                echo "<td>".$ColumnaSeparada[6]."</td>";
                                                echo "<td>".$ColumnaSeparada[7]."</td>";
                                                echo "<td>".$ColumnaSeparada[8]."</td>";
                                                echo "<td>".$ColumnaSeparada[9]."</td>";
                                                echo "<td>".$ColumnaSeparada[10]."</td>";
                                            echo "</tr>";
                                            $contador++;
                                            // Mostrar el array resultante
                                            //print_r("Fecha hora:".$ColumnaSeparada[0] ." Id de usuario:".$ColumnaSeparada[1] ." Dispositivo:".$ColumnaSeparada[5] . " Punto del evento:".$ColumnaSeparada[6] ." Verificación:".$ColumnaSeparada[7] . " Estado:".$ColumnaSeparada[8] ." Evento:".$ColumnaSeparada[9] ." Nose:".$ColumnaSeparada[11] ." Nose2:".$ColumnaSeparada[12] ."<br>");
                                        }

                                        // Puedes utilizar la variable $fila0 según sea necesario
                                        //print_r($fila0);

                                        // Cierra el archivo
                                        //fclose($file);
                                    } else {
                                        error_log("Error al abrir el archivo\n");
                                    }
                                } else {
                                    error_log("El archivo debe tener la extensión CSV\n");
                                }
                            } else {
                                error_log("Ocurrió un error al subir el archivo\n");
                            }
                        }
                    ?>

			  	</tbody>
			</table>
			<form action="" name='signup-form' method="post" enctype="multipart/form-data">
            	<div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <input type="submit" class="btn btn-success" value="Cargar" name="btn_Cargar">
                    <a href="../VISTAS/Cargas.php" class="btn btn-danger">No cargar</a>
				</div>
            </form>
		</div>
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

<?php 
    	
?>


<!--  has que cuando se le de click a los botones 'btn_Cargar' haga el mismo proceso que hace con el 'btn_Iniciar' pero al final de todo -->
