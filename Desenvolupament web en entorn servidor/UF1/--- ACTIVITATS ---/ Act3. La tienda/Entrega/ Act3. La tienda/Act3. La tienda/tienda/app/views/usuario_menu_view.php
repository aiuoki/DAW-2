<?php

    require '../models/usuarios_model.php';

    session_start();
    if(empty($_SESSION['nick'])) { // or $_SESSION['nick'] == "administrador"
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
    <link rel="stylesheet" href="../../public/css/salir.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
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
            <a class="salir" href="#">Salir</a>
        </div>
    </header>

    <main class="main">

        <div class="contenido">
            <h2>Menu</h2>
            <h2>Menu</h2>
        </div>

    </main>

    <section>
        <span class="overlay"></span>

        <div class="modal-box">
            <i class="fa-solid fa-right-from-bracket"></i>
            <h2>Cerrar sesión</h2>
            <h3>Esta apunto de cerrar la sesión</h3>

            <div class="buttons">
                <button class="volver-btn">Volver</button>
                <button onclick="window.location.href = '../models/logout_model.php'">Cerrar sesión</button>
            </div>
        </div>
    </section>

    <script>
        const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        salir = document.querySelector(".salir"),
        volverBtn = document.querySelector(".volver-btn");

        salir.addEventListener("click", () => section.classList.add("active"));

        overlay.addEventListener("click", () =>
            section.classList.remove("active")
        );

        volverBtn.addEventListener("click", () =>
            section.classList.remove("active")
        );
    </script>

</body>
</html>