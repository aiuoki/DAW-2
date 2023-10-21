<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Curso</title>
    <link rel="icon" href="../../public/img/curso.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/crear_curso_view.css">
</head>
<body>
    <div class="contenedor">
        <h1>Nuevo Curso</h1>
        <form action="../controllers/cursos_controller.php" method="post">
            <input type="text" name="nombre" pattern="[A-Za-z0-9]+" maxlength="60" placeholder="nombre" required>
            <input type="text" name="anio" pattern="[0-9]{4}" placeholder="año" required>
            <button type="submit" name="crear">Crear</button>
        </form>
        <button id="volver" onclick="window.location.href = 'index.php';">Volver</button>
    </div>
</body>
</html>