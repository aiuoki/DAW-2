<?php
// Incluir el archivo alumnos_model.php
require_once '../models/cursos_model.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos enviados por el formulario
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];

    if (isset($_POST['crear'])) {
        // Crear un nuevo curso utilizando la función crearCurso del modelo
        CursosModel::crearCurso($nombre, $anio);
    }
    if (isset($_POST['eliminar'])) {
        // Eliminar un curso utilizando la función eliminarCurso del modelo
        CursosModel::eliminarCurso($nombre);
    }
    
    // Redirigir al usuario a otra página
    header('Location: ../views/mostrar_cursos_view.php');
    exit;
} else {
    // Obtener todos los cursos utilizando la función mostrarCursos del modelo
    $cursos = CursosModel::mostrarCursos();
}
?>
