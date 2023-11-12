<?php
require_once '../db/db.php';

class CarritosController {
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
    public static function anadirCarrito($producto, $precio, $usuario) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM carritos WHERE producto = ? AND usuario = ?");
        $stmt->bind_param("ii", $producto, $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        if ($resultado->num_rows > 0) {
            $stmt = $conexion->prepare("UPDATE carritos SET cantidad = cantidad + 1, precio_total = precio_total + ? WHERE producto = ? AND usuario = ?");
            $stmt->bind_param("dii", $precio, $producto, $usuario);
        } else {
            $stmt = $conexion->prepare("INSERT INTO carritos (producto, cantidad, precio_total, usuario) VALUES (?, 1, ?, ?)");
            $stmt->bind_param("idi", $producto, $precio, $usuario);
        }
    
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function restarStock($producto) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("UPDATE productos SET stock = stock - 1 WHERE id_producto = ?");
        $stmt->bind_param("i", $producto);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function obtenerProductosCarrito($usuario) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT productos.*, carritos.cantidad, carritos.id_carrito FROM productos JOIN carritos ON productos.id_producto = carritos.producto WHERE carritos.usuario = ?");
        $stmt->bind_param("i", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $productos = $resultado->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $conexion->close();
        return $productos;
    }
    public static function eliminarProductoCarrito($id_carrito) {
        $conexion = Conectar::conexion();
        $conexion->begin_transaction();
    
        try {
            //Seleccionar la cantidad y el ID del producto
            $stmt = $conexion->prepare("SELECT cantidad, producto FROM carritos WHERE id_carrito = ?");
            $stmt->bind_param("i", $id_carrito);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $fila = $resultado->fetch_assoc();
            $cantidad = $fila['cantidad'];
            $producto = $fila['producto'];
    
            //Sumar la cantidad al stock del producto
            $stmt = $conexion->prepare("UPDATE productos SET stock = stock + ? WHERE id_producto = ?");
            $stmt->bind_param("ii", $cantidad, $producto);
            $stmt->execute();
    
            //Borrar el carrito
            $stmt = $conexion->prepare("DELETE FROM carritos WHERE id_carrito = ?");
            $stmt->bind_param("i", $id_carrito);
            $stmt->execute();
            $conexion->commit();
        } catch (Exception $e) {
            $conexion->rollback();
            throw $e;
        }

        $stmt->close();
        $conexion->close();
    }
}