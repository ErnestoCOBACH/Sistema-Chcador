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
    
    
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row tm-mb-90 tm-gallery">
        <?php            
            include '../PHP/conexion.php';            
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
                    $Clave=$row[1];//1
                    $nombre = $row[3];//2
                    $rfc = $row[2];//3
                    $descipcion = $row[4];//4
                    $correo= $row[5];//5
                    $contra="COBACH2023";//6
                    $contraConf="COBACH2023";//7
                    $categoria="";//8
                    $cambioBit=0;//9
                    $idempleado=$row[0];//10
                    $rol=2; //11   
                    // Llamar al procedimiento almacenado
                    $sqlAcciones = $mysqli->query("CALL InsertarUsuario('$Clave','$nombre','$rfc','$descipcion','$correo','$contra', '$contraConf', '$categoria', '$cambioBit', '$idempleado', '$rol');");
                    echo $sqlAcciones;
                    //echo $Clave." ".$nombre." ".$rfc." ".$descipcion." ".$correo." ".$contra." ".$contraConf." ".$categoria." ".$cambioBit." ".$idempleado." ".$rol."<br>";
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