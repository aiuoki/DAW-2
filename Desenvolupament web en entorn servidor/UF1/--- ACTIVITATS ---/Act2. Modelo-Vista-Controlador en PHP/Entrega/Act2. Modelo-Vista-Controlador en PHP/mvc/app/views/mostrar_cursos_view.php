<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="icon" href="../../public/img/curso.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/mostrar_cursos_view.css">
</head>
<body>
    <div class="contenedor">
        <h1>Cursos</h1>
            <table>
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>año</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../controllers/cursos_controller.php';
                        foreach($cursos as $curso) {
                            echo "<tr>";
                            echo "<td>". $curso['nombre'] ."</td>";
                            echo "<td>". $curso['anio'] ."</td>";
                            echo "</td>";
                        }
                    ?>
                </tbody>
            </table>
    </div>
    <button id="volver" onclick="window.location.href = 'index.php';">Volver</button>
</body>
</html>