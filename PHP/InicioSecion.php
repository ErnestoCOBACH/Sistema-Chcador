<?php
include 'PHP/conexion.php';

if (!empty($_POST['btn_Iniciar'])) {
    if (empty($_POST['Correo']) || empty($_POST['Pass'])) {
        echo "<div class='alert alert-danger'>Campos están vacíos</div>";
    } else {
        $Correo = $_POST['Correo'];
        $Pass = $_POST['Pass'];

        // Llamar al procedimiento almacenado
        $sql = $mysqli->query("CALL IniciarSesion('$Correo', '$Pass');");
        
        if ($datos = $sql->fetch_object()) {
            session_start();
            $_SESSION['USUARIO'] = $Correo;
            //var_dump($datos);
            //echo   ($datos['ContaNue']);

            $CambioDeContra = $datos->ContaNue;           

            echo "CambioDeContra: " . $CambioDeContra . "<br>";

            if($CambioDeContra=='0'){
                header("location:./PHP/CambioContra.php");
            }else{
                header("location:./VISTAS/Home.php");
            }

            //$_SESSION['ContaNue'] = $Correo;
			
            //header("location:./VISTAS/Home.php");
        } else {
            echo "<div class='alert alert-danger'>Datos incorrectos</div>";
        }
    }
}


?>
