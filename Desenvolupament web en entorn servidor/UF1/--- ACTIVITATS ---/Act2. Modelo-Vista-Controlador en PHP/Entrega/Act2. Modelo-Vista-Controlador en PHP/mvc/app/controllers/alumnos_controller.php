<?php
// Incluir los archivos db.php y alumnos_model.php
require_once '../db/db.php';
require_once '../models/alumnos_model.php';

// Obtener la conexión a la base de datos
$conexion = Conectar::conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos enviados por el formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $curso = $_POST['curso'];

    // Crear un nuevo alumno utilizando la función crearAlumno del modelo
    AlumnosModel::crearAlumno($nombre, $apellidos, $dni, $curso);
    
    // Redirigir al usuario a otra página
    header('Location: ../views/mostrar_alumnos_view.php');
    exit;
} else {
    // Obtener todos los alumnos utilizando la función mostrarAlumnos del modelo
    $alumnos = AlumnosModel::mostrarAlumnos();

    // Incluir la vista mostrar_alumnos_view.php
    require_once '../views/mostrar_alumnos_view.php';
}
?>