<?php

    // Incluir el archivo productos_controller.php
    require_once '../controllers/productos_controller.php';

    // Inicializar variables
    $nombre = null;
    $stock = null;
    $precio_unitario = null;
    $categoria = null;

    $select_error = null;
    $nombre_error = null;
    $stock_error = null;
    $precio_unitario_error = null;
    $categoria_error = null;

    $other_error = null;
    $success = null;

    $crear_producto = true;

    // Comprobar si se ha enviado el formulario de crear producto
    if(isset($_POST['crear-producto'])) {

        try {

            // Comprobar conexión
            if(ProductosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nombre = trim($_POST['nombre']);
                $stock = trim($_POST['stock']);
                $precio_unitario = trim($_POST['precio-unitario']);
                $categoria = trim($_POST['categoria']);
        
                // Validar nombre
                if(empty($nombre)) {
                    $nombre_error = "El campo nombre esta vacio";
                    $crear_producto = false;
                } else {
                    try {
                        if(ProductosController::comprobarNombre($nombre)) {
                            $nombre_error = "El nombre ya existe";
                            $crear_producto = false;
                        }
                    } catch(Exception $e) {
                        $nombre_error = "Error al comprobar el nombre";
                        $crear_producto = false;
                    }
                }

                // Validar stock
                if(empty($stock)) {
                    $stock_error = "El campo stock esta vacio";
                    $crear_producto = false;
                } else if(!is_numeric($stock)) {
                    $stock_error = "El campo stock debe ser un número";
                    $crear_producto = false;
                } else if($stock < 0) {
                    $stock_error = "Solo se permiten valores positivos";
                    $crear_producto = false;
                }

                // Validar precio unitario
                if(empty($precio_unitario)) {
                    $precio_unitario_error = "El campo precio unitario esta vacio";
                    $crear_producto = false;
                } else if(!is_numeric($precio_unitario)) {
                    $precio_unitario_error = "El campo precio unitario debe ser un número";
                    $crear_producto = false;
                } else if($precio_unitario < 0) {
                    $precio_unitario_error = "Solo se permiten valores positivos";
                    $crear_producto = false;
                }

                // Validar categoria
                if($categoria === "") {
                    $categoria_error = "El campo esta vacio";
                    $crear_producto = false;
                }
        
                // Crear producto
                if($crear_producto) {
                    try {
                        ProductosController::crearProducto($nombre, $stock, $precio_unitario, $categoria);
                        $success = "El producto se ha creado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_productos_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al crear el producto";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $modificar_producto = true;

    // Comprobar si se ha enviado el formulario de modificar producto
    if(isset($_POST['modificar-producto'])) {

        try {

            // Comprobar conexión
            if(ProductosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $old_nombre = trim($_POST['old-nombre']);
                $nombre = trim($_POST['nombre']);
                $stock = trim($_POST['stock']);
                $precio_unitario = trim($_POST['precio-unitario']);
                $categoria = trim($_POST['categoria']);
        
                // Validar nombre
                if(empty($nombre)) {
                    $nombre_error = "El campo nombre esta vacio";
                    $modificar_producto = false;
                } else {
                    try {
                        if($nombre != $old_nombre) {
                            if(ProductosController::comprobarNombre($nombre)) {
                                $nombre_error = "El nombre ya existe";
                                $modificar_producto = false;
                            }
                        }
                    } catch(Exception $e) {
                        $nombre_error = "Error al comprobar el nombre";
                        $modificar_producto = false;
                    }
                }

                // Validar stock
                if(empty($stock)) {
                    $stock_error = "El campo stock esta vacio";
                    $modificar_producto = false;
                } else if(!is_numeric($stock)) {
                    $stock_error = "El campo stock debe ser un número";
                    $modificar_producto = false;
                } else if($stock < 0) {
                    $stock_error = "Solo se permiten valores positivos";
                    $modificar_producto = false;
                }

                // Validar precio unitario
                if(empty($precio_unitario)) {
                    $precio_unitario_error = "El campo precio unitario esta vacio";
                    $modificar_producto = false;
                } else if(!is_numeric($precio_unitario)) {
                    $precio_unitario_error = "El campo precio unitario debe ser un número";
                    $modificar_producto = false;
                } else if($precio_unitario < 0) {
                    $precio_unitario_error = "Solo se permiten valores positivos";
                    $modificar_producto = false;
                }
                
                // Validar categoria
                if($categoria === "") {
                    $categoria_error = "El campo esta vacio";
                    $modificar_producto = false;
                }

                // Modificar producto
                if($modificar_producto) {
                    try {
                        ProductosController::modificarProducto($nombre, $stock, $precio_unitario, $categoria, $old_nombre);
                        $success = "Producto modificado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_productos_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al modificar el producto";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $eliminar_producto = true;

    // Comprobar si se ha enviado el formulario de modificar producto
    if(isset($_POST['eliminar-producto'])) {

        try {

            // Comprobar conexión
            if(ProductosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nombre = trim($_POST['nombre']);
                
                // Validar select
                if($nombre === "") {
                    $select_error = "El campo esta vacio";
                    $eliminar_producto = false;
                }
        
                // Eliminar producto
                if($eliminar_producto) {
                    try {
                        ProductosController::eliminarProducto($nombre);
                        $success = "Producto eliminado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_productos_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al eliminar el producto";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $productos = ProductosController::mostrarProductos();
    $productos_asc = ProductosController::mostrarProductosAsc();

?>