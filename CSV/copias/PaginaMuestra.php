<?php
    session_start();

    function MandarSegundaVista(){
        echo "Nose";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
            $targetDirectory = "uploads/page1/";
            $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
    
            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
            $_SESSION["file_path"] = $targetFile;
    
            header("Location: Subido.php");
            exit();
        }
    }
    
    function NOSE2(){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            MandarSegundaVista();
        }
    }

    function ProcesoTabala(){
        if ($_FILES['file']['error'] == 0) {
            $nombreArchivo = $_FILES['file']['name'];
            $tipoArchivo = $_FILES['file']['type'];
            $rutaTemporal = $_FILES['file']['tmp_name'];

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
                    }
                    fclose($file);

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





    function NOSE(){
        echo "accion";
        $targetDirectory = "uploads/page1/";
            $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
    
            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
        //header("Location: Subido.php");
    }
  



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../css/templatemo-style.css">
    <link rel="shortcut icon" href="../../img/logob.png">
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
    
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-90 tm-gallery">
            <center>
                <h1> Informacion cargada </h1>
            </center>   
                
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" name="" value="Buscar" id="boton1" onclick = "funcion();">
                <!--<button onclick="sendSecondView()" class="btn btn-success"> Cargar </button>-->
                <a href="../../VISTAS/Cargas.php" class="btn btn-danger">No cargar</a> 
            </div>
            <!--
            <form name='signup-form'  method="post"  action='#' enctype="multipart/form-data">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    
                    <input type="submit" class="btn btn-success" value="Cargar" name="btn_Cargar"  >
                                                          
                </div>
            </form>
            -->
            

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
                        //ProcesoTabala();
                        //if (isset($_POST['btn_Iniciar'])) {
                            //echo "aqui";
                            //MandarSegundaVista();
                           //ProcesoTabala();
                        //}
                            
                            
                        
                    ?>

                </tbody>
            </table>
            <form action="" name='signup-form' method="post" enctype="multipart/form-data">

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                    <input type="submit" class="btn btn-success" value="Cargar" name="btn_Cargar" id="btn_Cargar">
                    <a href="../VISTAS/Cargas.php" class="btn btn-danger">No cargar</a>
                </div>
            </form>
        </div>
        </div>
        <div id="result"></div>
        
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

    <script src="../../js/plugins.js"></script>
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
    <script>
        function funcion(){
            //alert('<?php echo NOSE(); ?>');
            /* Escribir en el Documento*/
            document.write('<?php echo NOSE(); ?>');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" integrity="sha384-q9CRHqZndzlxGLOj+xrdLDJa9ittGte1NksRmgJKeCV9DrM7Kz868XYqsKWPpAmn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  

</body>

</html>


