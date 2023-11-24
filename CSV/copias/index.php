<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <form action="PaginaMuestra.php" method="post" enctype="multipart/form-data">
        <label for="file">Selecionar archivo:</label>
        <input type="file" name="file" id="file" accept=".csv">
        <input type="submit" value="Mandar" name="btn_Iniciar">
    </form>
</body>
</html>
