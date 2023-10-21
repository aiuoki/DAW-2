<?php
require_once '../db/db.php';

class CursosModel {
    public static function crearCurso($nombre, $anio) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("INSERT INTO cursos (nombre, anio) VALUES (?, ?)");
        $stmt->bind_param("si", $nombre, $anio);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function eliminarCurso($nombre) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("DELETE FROM cursos WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function mostrarCursos() {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM cursos");
        $stmt->execute();
        $resultados = $stmt->get_result();
        $cursos = array();
        while ($fila = $resultados->fetch_assoc()) {
            $cursos[] = $fila;
        }
        $stmt->close();
        $conexion->close();
        return $cursos;
    }
}
?>