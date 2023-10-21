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
            <!-- <input type="text" name="nombre" pattern="[A-Za-z0-9]+" maxlength="60" placeholder="nombre" required> -->
            <select name="nombre" required>
                <option value="">Seleccione un curso</option>
                <?php
                    require_once '../controllers/cursos_controller.php';
                    // Obtener los cursos utilizando la función obtenerCursos del modelo
                    $cursos = CursosModel::mostrarCursos();
                    // Recorrer los cursos y crear una opción para cada uno
                    foreach ($cursos as $curso) {
                        echo "<option value='". $curso['nombre'] ."'>". $curso['nombre'] ."</option>";
                    }
                ?>
            </select>
            <button type="submit" name="eliminar">Eliminar</button>
        </form>
        <button id="volver" onclick="window.location.href = 'index.php';">Volver</button>
    </div>
</body>
</html>