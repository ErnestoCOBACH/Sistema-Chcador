<?php
session_start();

// Verifica si se ha enviado el formulario desde la página 2
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopila los datos del formulario y guárdalos en la sesión
    $_SESSION['form_data']['campo2'] = $_POST['campo2'];

    // Redirige a la página siguiente
    header('Location: pagina3.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página 2</title>
</head>
<body>
    <h2>Página 2</h2>
    <form method="post" action="pagina3.php">
        <label for="campo2">Campo 2:</label>
        <input type="text" name="campo2" required>
        <br>
        <input type="submit" value="Siguiente">
    </form>
</body>
</html>
