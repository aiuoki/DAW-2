<?php require '../models/usuarios_model.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atemporal</title>
    <link rel="icon" href="../../public/img/a.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/header.css">
    <link rel="stylesheet" href="../../public/css/formulario.css">
    <link rel="stylesheet" href="../../public/css/login.css">
    <?php

    if($nick_error != null) {
        ?> <style>.nick-error{display: flex;}</style> <?php
    }
    if($contrasenia_error != null) {
        ?> <style>.contrasenia-error{display: flex;}</style> <?php
    }
    if($success != null) {
        ?> <style>.success{display: flex;}</style> <?php
    }
    if($other_error != null) {
        ?> <style>.other-error{display: flex;}</style> <?php
    }

    ?>
</head>
<body>

    <header class="header">
        <div class="logo">
            <a href="index.php">
                <span>A</span>
                <span>t</span>
                <span>e</span>
                <span>m</span>
                <span>p</span>
                <span>o</span>
                <span>r</span>
                <span>a</span>
                <span>l</span>
            </a>
        </div>
        <nav class="navbar">
            <a href="registrarse_view.php">Registrarse</a>
            <p>|</p>
            <a href="iniciar_sesion_view.php">Iniciar Sesión</a>
        </nav>
    </header>

    <main class="main">
        <div class="contenido">

            <form name="form" class="form" action="" method="post" novalidate>

                <div class="inputBox">
                    <input type="text" name="nick" value="<?php echo $nick ?>" required>
                    <span>Nick</span>
                    <div class="errorBox nick-error">
                        <?php echo $nick_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <input type="password" name="contrasenia" required>
                    <span>Contraseña</span>
                    <div class="errorBox contrasenia-error">
                        <?php echo $contrasenia_error ?>
                    </div>
                </div>

                <div class="successBox success">
                    <?php echo $success ?>
                </div>
                <div class="errorBox other-error">
                    <?php echo $other_error ?>
                </div>

                <button type="submit" name="iniciar-sesion">Iniciar Sesión</button>

            </form>

        </div>
    </main>
    
</body>
</html>