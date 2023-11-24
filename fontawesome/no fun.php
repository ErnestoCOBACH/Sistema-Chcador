<?php
// Incluye el archivo Roles.php y realiza la verificación de sesión
include '../PHP/Roles.php';
$varsesion=$_SESSION['USUARIO'];
if ($varsesion == null || $varsesion="") {
    header("location:../index.php");
    die();
}

function procesarArchivo() {
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
                $contador = 1;

                while ($data = fgetcsv($file, 100000, ";")) {
                    $num = count($data);

                    // Separar la columna (sin contar la fila 0) por comas
                    $ColumnaSeparada = explode(",", $data[0]);
                    echo "<tr><th scope='row'>$contador</th>";
                    // ... (resto del código para mostrar los datos) ...
                    echo "</tr>";
                    $contador++;
                }

                // Cierra el archivo
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
<body>

    <!-- ... (resto del código) ... -->

    <?php
    if (isset($_POST['btn_Iniciar'])) {
        procesarArchivo();
    }

    if (isset($_POST['btn_Cargar'])) {
        procesarArchivo();
    }
    ?>

    <!-- ... (resto del código) ... -->

</body>
</html>
