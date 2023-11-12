<?php

    require '../models/usuarios_model.php';

    session_start();
    if(empty($_SESSION['nick']) or $_SESSION['nick'] !== "administrador") {
        header("Location: ../views/index.php");
    }

    require '../models/productos_model.php';
    require '../models/categorias_model.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atemporal</title>
    <link rel="icon" href="../../public/img/a.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/header.css">
    <link rel="stylesheet" href="../../public/css/formulario.css">
    <link rel="stylesheet" href="../../public/css/register.css">
    <?php

        if($nombre_error != null) {
            ?> <style>.nombre-error{display: flex;}</style> <?php
        }
        if($stock_error != null) {
            ?> <style>.stock-error{display: flex;}</style> <?php
        }
        if($precio_unitario_error != null) {
            ?> <style>.precio-unitario-error{display: flex;}</style> <?php
        }
        if($categoria_error != null) {
            ?> <style>.categoria-error{display: flex;}</style> <?php
        }
        if($success != null) {
            ?> <style>.success{display: flex;}</style> <?php
        }
        if($other_error != null) {
            ?> <style>.other-error{display: flex;}</style> <?php
        }

    ?>
    <style>
        .inputBox select {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background: #327bc0;
            border-radius: 5px;
            outline: none;
            color: #fff;
            font-size: 1em;
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
            <form class="form" action="" method="post" novalidate>

                <div class="inputBox">
                    <input type="text" name="nombre" value="<?php echo $nombre ?>" required>
                    <span>Nombre</span>
                    <div class="errorBox nombre-error">
                        <?php echo $nombre_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <input type="text" name="stock" value="<?php echo $stock ?>" required>
                    <span>Stock</span>
                    <div class="errorBox stock-error">
                        <?php echo $stock_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <input type="text" name="precio-unitario" value="<?php echo $precio_unitario ?>" required>
                    <span>Precio unitario</span>
                    <div class="errorBox precio-unitario-error">
                        <?php echo $precio_unitario_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <select name="categoria" required>
                        <option value="">Seleccione una categoria</option>
                        <?php
                            foreach ($categorias as $categoria) {
                                echo "<option value='". $categoria['id_categoria'] ."'>". $categoria['nombre'] ."</option>";
                            }
                        ?>
                    </select>
                    <div class="errorBox select-error">
                        <?php echo $select_error ?>
                    </div>
                </div>

                <div class="successBox success">
                    <?php echo $success ?>
                </div>
                <div class="errorBox other-error">
                    <?php echo $other_error ?>
                </div>

                <button type="submit" name="crear-producto">Crear producto</button>

            </form>
        </div>

    </main>

</body>
</html>