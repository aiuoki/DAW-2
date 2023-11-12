<?php

    require '../models/usuarios_model.php';

    session_start();
    if(empty($_SESSION['nick'])) {
        header("Location: ../views/index.php");
    }

    require '../models/carritos_model.php';

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
        .contenido button {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background: #327bc0;
            border-radius: 5px;
            outline: none;
            color: #fff;
            font-size: 1em;
        }
        .contenido button {
            cursor: pointer;
        }
        .contenido button:active {
            position: relative;
            top: 2px;
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
        <a href="usuario_modificar_prefil_view.php">Perfil</a>
        <a href="usuario_catalogo_productos_view.php">Catalogo</a>
        <a href="usuario_carrito_compra_view.php">Carrito</a>
        <div class="navbar">
            <a class="volver" href="usuario_menu_view.php">Volver</a>
        </div>
    </header>

    <main class="main">

        <div class="contenido">
            <h1>Carrito</h1>
            <table>
                <thead>
                    <tr>
                        <th>producto</th>
                        <th>cantidad</th>
                        <th>precio</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($productos as $producto) {
                                ?> <?php
                                        echo "<tr>";
                                        echo "<td>". $producto['nombre'] ."</td>";
                                        echo "<td>". $producto['cantidad'] ."</td>";
                                        echo "<td>". $producto['precio_unitario'] ."</td>";
                                        echo "<form class='form' method='post' novalidate>";
                                        echo "<input type='hidden' name='carrito' value='". $producto['id_carrito'] ."'>";
                                        echo "<td><button type='submit' name='eliminar-producto'>Eliminar producto</button></td>";
                                        echo "</form>";
                                        echo "</tr>";
                                ?> <?php
                            }
                        ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>
