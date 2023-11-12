<?php

    // Incluir el archivo carritos_controller.php
    require_once '../controllers/carritos_controller.php';
    // Incluir el archivo usuarios_controller.php
    require_once '../controllers/usuarios_controller.php';

    if(isset($_POST['comprar-producto'])) {
        // Recoger los datos del formulario
        $producto = trim($_POST['producto']);
        $precio = trim($_POST['precio']);
        $nick = trim($_POST['nick']);
        $usuario = UsuariosController::getIdUsuario($nick);

        try {
            CarritosController::anadirCarrito($producto, $precio, $usuario);
            CarritosController::restarStock($producto);
            header("Location: ../views/usuario_carrito_compra_view.php");
        } catch(Exception $e) {
            echo "Error al comprar el producto";
        }
    }

    if(isset($_POST['eliminar-producto'])) {
        // Recoger los datos del formulario
        $carrito = trim($_POST['carrito']);

        try {
            CarritosController::eliminarProductoCarrito($carrito);
            header("Location: ../views/usuario_carrito_compra_view.php");
        } catch(Exception $e) {
            echo "Error al eliminar el producto";
        }
    }

    $nick = trim($_SESSION['nick']);
    $usuario = UsuariosController::getIdUsuario($nick);
    $productos = CarritosController::obtenerProductosCarrito($usuario);

?>