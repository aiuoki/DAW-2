<?php

    require '../models/usuarios_model.php';

    session_start();
    if(empty($_SESSION['nick']) or $_SESSION['nick'] !== "administrador") {
        header("Location: ../views/index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atemporal</title>
    <link rel="icon" href="../../public/img/a.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/header.css">
    <link rel="stylesheet" href="../../public/css/index.css">
    <style>
        .contenido {
            text-align: center;
        }
        .contenido h1 {
            margin-bottom: 1em;
        }
        .contenido table {
            border-radius: 1em;
            border-spacing: 10px;
        }
        .contenido table, th, td {
            border: 2px solid black;
            padding: 10px;
        }
        a {
            position: relative;
            font-size: 24px;
            color: #fff;
            font-weight: 500;
            text-decoration: none;
            margin-right: 1em;
        }
        a::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 0;
            height: 2px;
            background: #fff;
            transition: .3s;
        }
        a:hover::before {
            width: 100%;
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo">
            <a href="#">
                <?php echo $_SESSION['nick']; ?>
            </a>
        </div>
        <a href="admin_menu_usuarios_view.php">Usuarios</a>
        <a href="admin_menu_categorias_view.php">Categorias</a>
        <a href="admin_menu_productos_view.php">Productos</a>
        <div class="navbar">
            <a class="volver" href="admin_menu_view.php">Volver</a>
        </div>
    </header>

    <main class="main">

        <div class="contenido">
            <h1>Usuarios</h1>
            <table>
                <thead>
                    <tr>
                        <th>id_usuario</th>
                        <th>nick</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($usuarios as $usuario) {
                            echo "<tr>";
                            echo "<td>". $usuario['id_usuario'] ."</td>";
                            echo "<td>". $usuario['nick'] ."</td>";
                            echo "<td>". $usuario['email'] ."</td>";
                            echo "</td>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>