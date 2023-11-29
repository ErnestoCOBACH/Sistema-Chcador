<?php
session_start();

// Inicializa o recupera los datos del formulario
if (!isset($_SESSION['form_data'])) {
    $_SESSION['form_data'] = [];
}

// Verifica si se ha enviado el formulario desde la página 1
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopila los datos del formulario y guárdalos en la sesión
    $_SESSION['form_data']['campo1'] = $_POST['campo1'];

    // Redirige a la página siguiente
    header('Location: pagina2.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página 1</title>
</head>
<body>
    <h2>Página 1</h2>
    <form method="post" action="pagina2.php">
        <label for="campo1">Campo 1:</label>
        <input type="text" name="campo1" required>
        <br>
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>
