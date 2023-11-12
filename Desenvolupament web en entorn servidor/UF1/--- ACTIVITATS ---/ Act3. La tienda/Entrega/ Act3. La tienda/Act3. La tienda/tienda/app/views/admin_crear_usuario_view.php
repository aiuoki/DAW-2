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
    <style>
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

                <button type="submit" name="crear-usuario">Crear usuario</button>

            </form>
        </div>

    </main>

</body>
</html>