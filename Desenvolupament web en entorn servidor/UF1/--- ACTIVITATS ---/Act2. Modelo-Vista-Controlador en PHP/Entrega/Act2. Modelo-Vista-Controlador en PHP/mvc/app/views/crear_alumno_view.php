<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Alumno</title>
    <link rel="icon" href="../../public/img/nuevo_alumno.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/crear_alumno_view.css">
</head>
<body>
    <div class="contenedor">
        <h1>Nuevo Alumno</h1>
        <form action="../controllers/alumnos_controller.php" method="post">
            <input type="text" name="nombre" pattern="[A-Za-z]+" maxlength="30" placeholder="nombre" required>
            <input type="text" name="apellidos" pattern="[A-Za-z ]+" maxlength="60" placeholder="apellidos" required>
            <input type="text" name="dni" pattern="[0-9]{8}[A-Za-z]" placeholder="dni" required>
            <!-- <input type="text" name="curso" pattern="[A-Za-z0-9]+" maxlength="60" placeholder="curso" required> -->
            <select name="curso" required>
                <option value="">Seleccione un curso</option>
                <?php
                    require_once '../controllers/cursos_controller.php';
                    // Recorrer los cursos y crear una opción para cada uno
                    foreach ($cursos as $curso) {
                        echo "<option value='". $curso['nombre'] ."'>". $curso['nombre'] ."</option>";
                    }
                ?>
            </select>
            <button type="submit" name="crear">Crear</button>
        </form>
        <button id="volver" onclick="window.location.href = 'index.php';">Volver</button>
    </div>
</body>
</html>