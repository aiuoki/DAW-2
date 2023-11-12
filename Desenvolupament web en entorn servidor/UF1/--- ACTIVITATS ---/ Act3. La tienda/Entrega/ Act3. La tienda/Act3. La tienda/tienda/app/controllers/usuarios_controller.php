<?php
require_once '../db/db.php';

class UsuariosController {
    public static function probarConexion() {
        $conexion = Conectar::conexion();
        if ($conexion->connect_error) {
            $conexion->close();
            return false;
        } else {
            $conexion->close();
            return true;
        }
    }
    public static function comprobarNick($nick) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nick = ?");
        $stmt->bind_param("s", $nick);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $usuario !== null;
    }
    public static function comprobarEmail($email) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $usuario !== null;
    }
    public static function registrarUsuario($nick, $email, $contrasenia) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nick, email, contrasenia) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nick, $email, $contrasenia);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function iniciarSesion($nick, $contrasenia) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nick = ? AND contrasenia = ?");
        $stmt->bind_param("ss", $nick, $contrasenia);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $usuario !== null;
    }
    public static function modificarUsuario($nick, $email, $contrasenia, $old_nick) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("UPDATE usuarios SET nick = ?, email = ?, contrasenia = ? WHERE nick = ?");
        $stmt->bind_param("ssss", $nick, $email, $contrasenia, $old_nick);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function eliminarUsuario($nick) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE nick = ?");
        $stmt->bind_param("s", $nick);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function mostrarUsuarios() {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $resultados = $stmt->get_result();
        $usuarios = array();
        while ($fila = $resultados->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        $stmt->close();
        $conexion->close();
        return $usuarios;
    }
    public static function getEmail($nick, $email) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT email FROM usuarios WHERE nick = ? AND email = ?");
        $stmt->bind_param("ss", $nick, $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $usuario !== null;
    }
    public static function getIdUsuario($nick) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE nick = ?");
        $stmt->bind_param("s", $nick);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $usuario['id_usuario'];
    }
}
?>