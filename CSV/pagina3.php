<?php
session_start();

// Verifica si se ha enviado el formulario desde la página 3
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopila los datos del formulario y guárdalos en la sesión
    $_SESSION['form_data']['campo3'] = $_POST['campo3'];

    // Aquí puedes procesar o almacenar los datos según tus necesidades

    // Puedes también limpiar la sesión, ya que el formulario está completo
    unset($_SESSION['form_data']);

    // Puedes redirigir a una página de confirmación o agradecimiento
    header('Location: confirmacion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página 3</title>
</head>
<body>
    <h2>Página 3</h2>
    <form method="post" action="pagina3.php">
        <label for="campo3">Campo 3:</label>
        <input type="text" name="campo3" required>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
