<?php

    require '../models/usuarios_model.php';

    session_start();
    if(empty($_SESSION['nick'])) {
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
    <link rel="stylesheet" href="../../public/css/modificar_prefil_usuario.css">
    <?php

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
        <a href="usuario_modificar_prefil_view.php">Perfil</a>
        <a href="usuario_catalogo_productos_view.php">Catalogo</a>
        <a href="usuario_carrito_compra_view.php">Carrito</a>
        <div class="navbar">
            <a class="volver" href="usuario_menu_view.php">Volver</a>
        </div>
    </header>

    <main class="main">

        <div class="contenido"> 
            <form class="form" action="" method="post" novalidate>

                <input type="hidden" name="nick" value="<?php echo $_SESSION['nick'] ?>">

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

                <button type="submit" name="modificar-informacion">Modificar información</button>

            </form>
        </div>

    </main>

</body>
</html>