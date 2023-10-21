<?php
// Incluir el archivo alumnos_model.php
require_once '../models/alumnos_model.php';

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
}
?>
