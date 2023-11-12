<?php
require_once '../db/db.php';

class ProductosController {
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
        $stmt = $conexion->prepare("SELECT * FROM productos WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $producto = $resultado->fetch_assoc();
        $stmt->close();
        $conexion->close();
        return $producto !== null;
    }
    public static function crearProducto($nombre, $stock, $precio_unitario, $categoria) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("INSERT INTO productos (nombre, stock, precio_unitario, categoria) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sidi", $nombre, $stock, $precio_unitario, $categoria);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function modificarProducto($nombre, $stock, $precio_unitario, $categoria, $old_nombre) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, stock = ?, precio_unitario = ?, categoria = ? WHERE nombre = ?");
        $stmt->bind_param("sidis", $nombre, $stock, $precio_unitario, $categoria, $old_nombre);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function eliminarProducto($nombre) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("DELETE FROM productos WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function mostrarProductos() {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT productos.*, categorias.nombre AS nombre_categoria FROM productos JOIN categorias ON productos.categoria = categorias.id_categoria");
        $stmt->execute();
        $resultados = $stmt->get_result();
        $productos = array();
        while ($fila = $resultados->fetch_assoc()) {
            $productos[] = $fila;
        }
        $stmt->close();
        $conexion->close();
        return $productos;
    }
    public static function mostrarProductosAsc() {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM productos WHERE stock > 0 ORDER BY precio_unitario ASC");
        $stmt->execute();
        $resultados = $stmt->get_result();
        $productos = array();
        while ($fila = $resultados->fetch_assoc()) {
            $productos[] = $fila;
        }
        $stmt->close();
        $conexion->close();
        return $productos;
    }
}
?>