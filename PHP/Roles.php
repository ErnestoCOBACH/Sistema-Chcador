<?php
session_start();
include 'conexion.php';

$Correo = $_SESSION['USUARIO'];

// Llamar al procedimiento almacenado
$sqlAcciones = $mysqli->query("CALL ObtenerAccionesPorCorreo('$Correo');");

if ($sqlAcciones) {
    // Obtener el conjunto de resultados
    $acciones = $sqlAcciones->fetch_object();

    if ($acciones) {
        // Almacenar la información en variables de sesión
        $_SESSION['NOMBRE_ROL'] = $acciones->Nombre_Rol;
        $_SESSION['ALTAS'] = $acciones->Altas;
        $_SESSION['BAJAS'] = $acciones->Bajas;
        $_SESSION['CAMBIOS'] = $acciones->Cambios;
    }
}
?>
