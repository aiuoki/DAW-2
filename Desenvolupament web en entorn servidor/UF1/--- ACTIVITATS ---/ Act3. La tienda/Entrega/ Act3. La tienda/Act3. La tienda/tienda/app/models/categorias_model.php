<?php

    // Incluir el archivo categorias_controller.php
    require_once '../controllers/categorias_controller.php';

    // Inicializar variables
    $nombre = null;
    $descripcion = null;

    $select_error = null;
    $nombre_error = null;

    $other_error = null;
    $success = null;

    $crear_categoria = true;

    // Comprobar si se ha enviado el formulario de crear categoria
    if(isset($_POST['crear-categoria'])) {

        try {

            // Comprobar conexión
            if(CategoriasController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nombre = trim($_POST['nombre']);
                $descripcion = trim($_POST['descripcion']);
        
                // Validar nombre
                if(empty($nombre)) {
                    $nombre_error = "El campo nombre esta vacio";
                    $crear_categoria = false;
                } else {
                    try {
                        if(CategoriasController::comprobarNombre($nombre)) {
                            $nombre_error = "El nombre ya existe";
                            $crear_categoria = false;
                        }
                    } catch(Exception $e) {
                        $nombre_error = "Error al comprobar el nombre";
                        $crear_categoria = false;
                    }
                }
        
                // Crear categoria
                if($crear_categoria) {
                    try {
                        CategoriasController::crearCategoria($nombre, $descripcion);
                        $success = "La categoria se ha creado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_categorias_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al crear la categoria";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $modificar_categoria = true;

    // Comprobar si se ha enviado el formulario de modificar categoria
    if(isset($_POST['modificar-categoria'])) {

        try {

            // Comprobar conexión
            if(CategoriasController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $old_nombre = trim($_POST['old-nombre']);
                $nombre = trim($_POST['nombre']);
                $descripcion = trim($_POST['descripcion']);
                
                // Validar select
                if($old_nombre === "") {
                    $select_error = "El campo esta vacio";
                    $modificar_categoria = false;
                }

                // Validar nombre
                if(empty($nombre)) {
                    $nombre_error = "El campo nombre esta vacio";
                    $modificar_categoria = false;
                } else {
                    if($nombre != $old_nombre) {
                        try {
                            if(CategoriasController::comprobarNombre($nombre)) {
                                $nombre_error = "El nombre ya existe";
                                $modificar_categoria = false;
                            }
                        } catch(Exception $e) {
                            $nombre_error = "Error al comprobar el nombre";
                            $modificar_categoria = false;
                        }
                    }
                }

                // Modificar categoria
                if($modificar_categoria) {
                    try {
                        CategoriasController::modificarCategoria($nombre, $descripcion, $old_nombre);
                        $success = "Categoria modificada correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_categorias_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al modificar la categoria";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $eliminar_categoria = true;

    // Comprobar si se ha enviado el formulario de modificar categoria
    if(isset($_POST['eliminar-categoria'])) {

        try {

            // Comprobar conexión
            if(CategoriasController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nombre = trim($_POST['nombre']);
                
                // Validar select
                if($nombre === "") {
                    $select_error = "El campo esta vacio";
                    $eliminar_categoria = false;
                }
        
                // Eliminar categoria
                if($eliminar_categoria) {
                    try {
                        CategoriasController::eliminarCategoria($nombre);
                        $success = "Categoria eliminada correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_categorias_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al eliminar la categoria";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $categorias = CategoriasController::mostrarCategorias();

?>