<?php

include 'conexion.php';
$Correo = $_SESSION['USUARIO'];
$sql = $mysqli->query("CALL P_RevisarChecadas('$Correo');");

// Verificar si la llamada al procedimiento almacenado fue exitosa
if ($sql) {
    echo "<table class='table table-striped '>";
    echo "<tr>";
    echo "<th class='table-dark text-center'>Estado</th>";
	echo "<th class='table-dark text-center'>Verificacion</th>";
	echo "<th class='table-dark text-center'>Fecha</th>";
	echo "<th class='table-dark text-center'>Hora</th>";
	

    // ... Agrega aquí más encabezados según las columnas de tu procedimiento almacenado
    echo "</tr>";

    // Almacenar completamente los resultados en el lado del servidor
    

    while ($row = $sql->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='text-center'>" . htmlspecialchars($row['Estado']) . "</td>";
		echo "<td class='text-center'>" . htmlspecialchars($row['Verificacion']) . "</td>";
		echo "<td class='text-center'>" . htmlspecialchars($row['Dia']) .'/'.$row['Mes'] .'/'.$row['Anio']. "</td>";
		echo "<td class='text-center'>" . htmlspecialchars($row['Hora']) . "</td>";
        // ... Agrega aquí más celdas según las columnas de tu procedimiento almacenado
        echo "</tr>";
    }

    echo "</table>";

    // Liberar el conjunto de resultados
    $sql->free_result();
} else {
    echo "Error al ejecutar el procedimiento almacenado: " . $mysqli->error;
}
?>
