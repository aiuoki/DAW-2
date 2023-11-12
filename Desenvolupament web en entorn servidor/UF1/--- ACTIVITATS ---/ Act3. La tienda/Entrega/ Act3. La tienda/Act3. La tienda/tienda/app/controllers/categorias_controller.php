<?php
require_once '../db/db.php';

class CategoriasController {
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
    public static function comprobarNombre($nombre) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM categorias WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $categoria = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $categoria !== null;
    }
    public static function crearCategoria($nombre, $descripcion) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $descripcion);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function modificarCategoria($nombre, $descripcion, $old_nombre) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("UPDATE categorias SET nombre = ?, descripcion = ? WHERE nombre = ?");
        $stmt->bind_param("sss", $nombre, $descripcion, $old_nombre);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function eliminarCategoria($nombre) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("DELETE FROM categorias WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function mostrarCategorias() {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM categorias");
        $stmt->execute();
        $resultados = $stmt->get_result();
        $categorias = array();
        while ($fila = $resultados->fetch_assoc()) {
            $categorias[] = $fila;
        }
        $stmt->close();
        $conexion->close();
        return $categorias;
    }
}
?>