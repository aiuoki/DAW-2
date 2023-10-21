<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
    <link rel="icon" href="../../public/img/alumnos.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/mostrar_alumnos_view.css">
</head>
<body>
    <div class="contenedor">
        <h1>Alumnos</h1>
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>dni</th>
                    <th>curso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../controllers/alumnos_controller.php';
                    foreach($alumnos as $alumno) {
                        echo "<tr>";
                        echo "<td>". $alumno['nombre'] ."</td>";
                        echo "<td>". $alumno['apellidos'] ."</td>";
                        echo "<td>". $alumno['dni'] ."</td>";
                        echo "<td>". $alumno['curso'] ."</td>";
                        echo "</td>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <button id="volver" onclick="window.location.href = 'index.php';">Volver</button>
</body>
</html>