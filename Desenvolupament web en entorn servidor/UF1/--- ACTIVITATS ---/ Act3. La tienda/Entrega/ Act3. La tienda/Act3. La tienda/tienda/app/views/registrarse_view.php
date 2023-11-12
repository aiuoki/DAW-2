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
    <link rel="stylesheet" href="../../public/css/register.css">
    <?php

        if($nick_error != null) {
            ?> <style>.nick-error{display: flex;}</style> <?php
        }
        if($email_error != null) {
            ?> <style>.email-error{display: flex;}</style> <?php
        }
        if($contrasenia_error != null) {
            ?> <style>.contrasenia-error{display: flex;}</style> <?php
        }
        if($contrasenia2_error != null) {
            ?> <style>.contrasenia2-error{display: flex;}</style> <?php
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

            <form class="form" action="" method="post" novalidate>

                <div class="inputBox">
                    <input type="text" name="nick" value="<?php echo $nick ?>" required>
                    <span>Nick</span>
                    <div class="errorBox nick-error">
                        <?php echo $nick_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <input type="text" name="email" value="<?php echo $email ?>" required>
                    <span>Email</span>
                    <div class="errorBox email-error">
                        <?php echo $email_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <input type="password" name="contrasenia" value="<?php echo $contrasenia ?>" required>
                    <span>Contraseña</span>
                    <div class="errorBox contrasenia-error">
                        <?php echo $contrasenia_error ?>
                    </div>
                </div>

                <div class="inputBox">
                    <input type="password" name="contrasenia2" value="<?php echo $contrasenia2 ?>" required>
                    <span>Confirmar Contraseña</span>
                    <div class="errorBox contrasenia2-error">
                        <?php echo $contrasenia2_error ?>
                    </div>
                </div>

                <div class="successBox success">
                    <?php echo $success ?>
                </div>
                <div class="errorBox other-error">
                    <?php echo $other_error ?>
                </div>

                <button type="submit" name="registrarse">Registrarse</button>

            </form>

        </div>
    </main>
    
</body>
</html>