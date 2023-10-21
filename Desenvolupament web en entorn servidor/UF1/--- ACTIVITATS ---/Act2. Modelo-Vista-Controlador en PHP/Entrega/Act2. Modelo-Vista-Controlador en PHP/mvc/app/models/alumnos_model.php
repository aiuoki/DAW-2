<?php
require_once '../db/db.php';

class AlumnosModel {
    public static function crearAlumno($nombre, $apellidos, $dni, $curso) {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("INSERT INTO alumnos (nombre, apellidos, dni, curso) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $apellidos, $dni, $curso);
        $stmt->execute();
        $stmt->close();
        $conexion->close();
    }
    public static function mostrarAlumnos() {
        $conexion = Conectar::conexion();
        $stmt = $conexion->prepare("SELECT * FROM alumnos");
        $stmt->execute();
        $resultados = $stmt->get_result();
        $alumnos = array();
        while ($fila = $resultados->fetch_assoc()) {
            $alumnos[] = $fila;
        }
        $stmt->close();
        $conexion->close();
        return $alumnos;
    }
}
?>