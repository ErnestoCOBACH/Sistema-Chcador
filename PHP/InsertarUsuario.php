<?php 
    include 'conexion.php'; 
    
    //echo  (empty($_POST['btn_Iniciar']));

    if(!empty($_POST['btn_Iniciar'])){
        $Clave=$_POST['Empleado'];//1
        $nombre = $_POST['Nombre'];//2
        $rfc =  $_POST['RFC'];//3
        $descipcion = $_POST['Descripcion'];//4
        $correo=  $_POST['Correo'];//5
        $contra=$_POST['Contraseña'];//6
        $contraConf=$_POST['ConfContraseña'];//7
        $categoria="";//8
        $cambioBit=1;//9
        $idempleado=$_POST['IdEmpleado'];//10
        $rol=2; //11   
        // Llamar al procedimiento almacenado
        $sqlAcciones = $mysqli->query("CALL InsertarUsuario('$Clave','$nombre','$rfc','$descipcion','$correo','$contra', '$contraConf', '$categoria', '$cambioBit', '$idempleado', '$rol');");
        
        if($sqlAcciones==1){
            echo "<div class='alert alert-success'>Se agrego con exito</div>";
        }else{
            echo "<div class='alert alert-danger'>Datos incorrectos</div>";
        }
        

    }
    


?>
