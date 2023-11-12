<?php

    // Incluir el archivo usuarios_controller.php
    require_once '../controllers/usuarios_controller.php';

    // Inicializar variables
    $nick = null;
    $email = null;
    $contrasenia = null;
    $contrasenia2 = null;

    $select_error = null;
    $nick_error = null;
    $email_error = null;
    $contrasenia_error = null;
    $contrasenia2_error = null;

    $other_error = null;
    $success = null;

    $registrar = true;

    // Comprobar si se ha enviado el formulario de registro
    if(isset($_POST['registrarse'])) {

        try {

            // Comprobar conexión
            if(UsuariosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nick = trim($_POST['nick']);
                $email = trim($_POST['email']);
                $contrasenia = trim($_POST['contrasenia']);
                $contrasenia2 = trim($_POST['contrasenia2']);
        
                // Validar nick
                if(empty($nick)) {
                    $nick_error = "El campo nick esta vacio";
                    $registrar = false;
                } else if(strlen($nick) > 30) {
                    $nick_error = "El nick es demasiado largo";
                    $registrar = false;
                } else if(!preg_match('/^[A-Za-z0-9]+$/', $nick)) {
                    $nick_error = "El nick solo puede contener letras y numeros";
                    $registrar = false;
                } else {
                    try {
                        if(UsuariosController::comprobarNick($nick)) {
                            $nick_error = "El nick ya existe";
                            $registrar = false;
                        }
                    } catch(Exception $e) {
                        $nick_error = "Error al comprobar el nick";
                        $registrar = false;
                    }
                }
        
                // Validar email
                if(empty($email)) {
                    $email_error = "El campo email esta vacio";
                    $registrar = false;
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "El email no es valido";
                    $registrar = false;
                } else {
                    try {
                        if(UsuariosController::comprobarEmail($email)) {
                            $email_error = "El email ya existe";
                            $registrar = false;
                        }
                    } catch(Exception $e) {
                        $email_error = "Error al comprobar el email";
                        $registrar = false;
                    }
                }
        
                // Validar contraseña
                if(empty($contrasenia)) {
                    $contrasenia_error = "El campo contraseña esta vacio";
                    $registrar = false;
                } else if(strlen($contrasenia) < 3) {
                    $contrasenia_error = "La contraseña es demasiado corta";
                    $registrar = false;
                } else if(strlen($contrasenia) > 80) {
                    $contrasenia_error = "La contraseña es demasiado larga";
                    $registrar = false;
                }
        
                // Validar contraseña2
                if($contrasenia2 != $contrasenia) {
                    $contrasenia2_error = "Las contraseñas no coinciden";
                    $registrar = false;
                }
        
                // Registrar usuario
                if($registrar) {
                    try {
                        $contrasenia = md5($contrasenia);
                        UsuariosController::registrarUsuario($nick, $email, $contrasenia);
                        $success = "Usuario registrado correctamente";

                        // Iniciar sesión
                        if(UsuariosController::iniciarSesion($nick, $contrasenia)) {
                            // Crear variable de sesión
                            session_start();
                            $_SESSION['nick'] = $nick;

                            // Redirigir a la página correspondiente
                            if($nick == "administrador") {
                                header("Location: ../views/admin_menu_view.php");
                            } else {
                                header("Location: ../views/usuario_menu_view.php");
                            }
                        }
                    } catch(Exception $e) {
                        $other_error = "Error al registrar el usuario";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $iniciar_sesion = true;

    // Comprobar si se ha enviado el formulario de inicio de sesión
    if(isset($_POST['iniciar-sesion'])) {

        try {

            // Comprobar conexión
            if(UsuariosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nick = trim($_POST['nick']);
                $contrasenia = trim($_POST['contrasenia']);

                // Validar nick
                if(empty($nick)) {
                    $nick_error = "El campo nick esta vacio";
                    $iniciar_sesion = false;
                }

                // Validar contraseña
                if(empty($contrasenia)) {
                    $contrasenia_error = "El campo contraseña esta vacio";
                    $iniciar_sesion = false;
                }

                if($iniciar_sesion) {
                    try {
                        $contrasenia = md5($contrasenia);
                        if(UsuariosController::iniciarSesion($nick, $contrasenia)) {
                            $success = "Sesión iniciada correctamente";

                            // Crear variable de sesión
                            session_start();
                            $_SESSION['nick'] = $nick;
                            
                            // Redirigir a la página correspondiente
                            if($nick == "administrador") {
                                header("Location: ../views/admin_menu_view.php");
                            } else {
                                header("Location: ../views/usuario_menu_view.php");
                            }
                        } else {
                            $other_error = "El nick o la contraseña son incorrectos";
                        }
                    } catch(Exception $e) {
                        $other_error = "Error al iniciar sesión";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $modificar_informacion = true;

    // Comprobar si se ha enviado el formulario de modificar información
    if(isset($_POST['modificar-informacion'])) {

        try {

            // Comprobar conexión
            if(UsuariosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nick = trim($_POST['nick']);
                $old_nick = trim($_POST['nick']);
                $email = trim($_POST['email']);
                $contrasenia = trim($_POST['contrasenia']);
                $contrasenia2 = trim($_POST['contrasenia2']);
        
                // Validar email
                if(empty($email)) {
                    $email_error = "El campo email esta vacio";
                    $modificar_informacion = false;
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "El email no es valido";
                    $modificar_informacion = false;
                } else {
                    try {
                        if(!UsuariosController::getEmail($nick, $email)) {
                            if(UsuariosController::comprobarEmail($email)) {
                                $email_error = "El email ya existe";
                                $modificar_informacion = false;
                            }
                        }
                    } catch(Exception $e) {
                        $email_error = "Error al comprobar el email";
                        $modificar_informacion = false;
                    }
                }
        
                // Validar contraseña
                if(empty($contrasenia)) {
                    $contrasenia_error = "El campo contraseña esta vacio";
                    $modificar_informacion = false;
                } else if(strlen($contrasenia) < 3) {
                    $contrasenia_error = "La contraseña es demasiado corta";
                    $modificar_informacion = false;
                } else if(strlen($contrasenia) > 80) {
                    $contrasenia_error = "La contraseña es demasiado larga";
                    $modificar_informacion = false;
                }
        
                // Validar contraseña2
                if($contrasenia2 != $contrasenia) {
                    $contrasenia2_error = "Las contraseñas no coinciden";
                    $modificar_informacion = false;
                }
        
                // Modificar usuario
                if($modificar_informacion) {
                    try {
                        $contrasenia = md5($contrasenia);
                        UsuariosController::modificarUsuario($nick, $email, $contrasenia, $old_nick);
                        $success = "Usuario modificado correctamente";
                    } catch(Exception $e) {
                        $other_error = "Error al modificar el usuario";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $crear_usuario = true;

    // Comprobar si se ha enviado el formulario de crear usuario
    if(isset($_POST['crear-usuario'])) {

        try {

            // Comprobar conexión
            if(UsuariosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nick = trim($_POST['nick']);
                $email = trim($_POST['email']);
                $contrasenia = trim($_POST['contrasenia']);
                $contrasenia2 = trim($_POST['contrasenia2']);
        
                // Validar nick
                if(empty($nick)) {
                    $nick_error = "El campo nick esta vacio";
                    $crear_usuario = false;
                } else if(strlen($nick) > 30) {
                    $nick_error = "El nick es demasiado largo";
                    $crear_usuario = false;
                } else if(!preg_match('/^[A-Za-z0-9]+$/', $nick)) {
                    $nick_error = "El nick solo puede contener letras y numeros";
                    $crear_usuario = false;
                } else {
                    try {
                        if(UsuariosController::comprobarNick($nick)) {
                            $nick_error = "El nick ya existe";
                            $crear_usuario = false;
                        }
                    } catch(Exception $e) {
                        $nick_error = "Error al comprobar el nick";
                        $crear_usuario = false;
                    }
                }
        
                // Validar email
                if(empty($email)) {
                    $email_error = "El campo email esta vacio";
                    $crear_usuario = false;
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "El email no es valido";
                    $crear_usuario = false;
                } else {
                    try {
                        if(UsuariosController::comprobarEmail($email)) {
                            $email_error = "El email ya existe";
                            $crear_usuario = false;
                        }
                    } catch(Exception $e) {
                        $email_error = "Error al comprobar el email";
                        $crear_usuario = false;
                    }
                }
        
                // Validar contraseña
                if(empty($contrasenia)) {
                    $contrasenia_error = "El campo contraseña esta vacio";
                    $crear_usuario = false;
                } else if(strlen($contrasenia) < 3) {
                    $contrasenia_error = "La contraseña es demasiado corta";
                    $crear_usuario = false;
                } else if(strlen($contrasenia) > 80) {
                    $contrasenia_error = "La contraseña es demasiado larga";
                    $crear_usuario = false;
                }
        
                // Validar contraseña2
                if($contrasenia2 != $contrasenia) {
                    $contrasenia2_error = "Las contraseñas no coinciden";
                    $crear_usuario = false;
                }
        
                // Crear usuario
                if($crear_usuario) {
                    try {
                        $contrasenia = md5($contrasenia);
                        UsuariosController::registrarUsuario($nick, $email, $contrasenia);
                        $success = "Usuario creado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_usuarios_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al crear el usuario";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $modificar_usuario = true;

    // Comprobar si se ha enviado el formulario de modificar usuario
    if(isset($_POST['modificar-usuario'])) {

        try {

            // Comprobar conexión
            if(UsuariosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $old_nick = trim($_POST['old-nick']);
                $nick = trim($_POST['nick']);
                $email = trim($_POST['email']);
                $contrasenia = trim($_POST['contrasenia']);
                $contrasenia2 = trim($_POST['contrasenia2']);
                
                // Validar select
                if($old_nick === "") {
                    $select_error = "El campo esta vacio";
                    $modificar_usuario = false;
                }

                // Validar nick
                if(empty($nick)) {
                    $nick_error = "El campo nick esta vacio";
                    $modificar_usuario = false;
                } else if(strlen($nick) > 30) {
                    $nick_error = "El nick es demasiado largo";
                    $modificar_usuario = false;
                } else if(!preg_match('/^[A-Za-z0-9]+$/', $nick)) {
                    $nick_error = "El nick solo puede contener letras y numeros";
                    $modificar_usuario = false;
                } else {
                    if($nick != $old_nick) {
                        try {
                            if(UsuariosController::comprobarNick($nick)) {
                                $nick_error = "El nick ya existe";
                                $modificar_usuario = false;
                            }
                        } catch(Exception $e) {
                            $nick_error = "Error al comprobar el nick";
                            $modificar_usuario = false;
                        }
                    }
                }

                // Validar email
                if(empty($email)) {
                    $email_error = "El campo email esta vacio";
                    $modificar_usuario = false;
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "El email no es valido";
                    $modificar_usuario = false;
                } else {
                    try {
                        if(!UsuariosController::getEmail($old_nick, $email)) {
                            if(UsuariosController::comprobarEmail($email)) {
                                $email_error = "El email ya existe";
                                $modificar_usuario = false;
                            }
                        }
                    } catch(Exception $e) {
                        $email_error = "Error al comprobar el email";
                        $modificar_usuario = false;
                    }
                }
        
                // Validar contraseña
                if(empty($contrasenia)) {
                    $contrasenia_error = "El campo contraseña esta vacio";
                    $modificar_usuario = false;
                } else if(strlen($contrasenia) < 3) {
                    $contrasenia_error = "La contraseña es demasiado corta";
                    $modificar_usuario = false;
                } else if(strlen($contrasenia) > 80) {
                    $contrasenia_error = "La contraseña es demasiado larga";
                    $modificar_usuario = false;
                }
        
                // Validar contraseña2
                if($contrasenia2 != $contrasenia) {
                    $contrasenia2_error = "Las contraseñas no coinciden";
                    $modificar_usuario = false;
                }
        
                // Modificar usuario
                if($modificar_usuario) {
                    try {
                        $contrasenia = md5($contrasenia);
                        UsuariosController::modificarUsuario($nick, $email, $contrasenia, $old_nick);
                        $success = "Usuario modificado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_usuarios_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al modificar el usuario";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $eliminar_usuario = true;

    // Comprobar si se ha enviado el formulario de modificar información
    if(isset($_POST['eliminar-usuario'])) {

        try {

            // Comprobar conexión
            if(UsuariosController::probarConexion()) {

                // Conexión correcta

                // Recoger datos
                $nick = trim($_POST['nick']);
                
                // Validar select
                if($nick === "") {
                    $select_error = "El campo esta vacio";
                    $eliminar_usuario = false;
                }
        
                // Eliminar usuario
                if($eliminar_usuario) {
                    try {
                        UsuariosController::eliminarUsuario($nick);
                        $success = "Usuario eliminado correctamente";

                        // Redirigir a la página correspondiente
                        header("Location: ../views/admin_mostrar_usuarios_view.php");
                    } catch(Exception $e) {
                        $other_error = "Error al eliminar el usuario";
                    }
                }

            }

        } catch(Exception $e) {
            $other_error = "Error al conectar con la base de datos";
        }

    }

    $usuarios = UsuariosController::mostrarUsuarios();

?>