<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Curso</title>
    <link rel="icon" href="../../public/img/eliminar_curso.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/eliminar_curso_view.css">
</head>
<body>
    <div class="contenedor">
        <h1>Eliminar Curso</h1>
        <form action="../controllers/cursos_controller.php" method="post">
            <input type="text" name="nombre" pattern="[A-Za-z0-9]+" maxlength="60" placeholder="nombre" required>
            <button type="submit" name="eliminar">Eliminar</button>
        </form>
        <button id="volver" onclick="window.location.href = 'index.php';">Volver</button>
    </div>
</body>
</html>