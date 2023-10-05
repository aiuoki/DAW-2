<?php

$dni = $_GET['dni'];
$nombre = $_GET['nombre'];
$direccion = $_GET['direccion'];
$email = $_GET['email'];

$crear = $_GET['crear'] ?? 'null';
$actualizar = $_GET['actualizar'] ?? 'null';
$mostrar = $_GET['mostrar'] ?? 'null';
$eliminar = $_GET['eliminar'] ?? 'null';

$servidor="localhost";
$usuario="root";
$password="";
$bd="act1";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if(!$con) {
    die("No se ha podido realizar la conexión_".mysqli_connect_error().".");
} else {

    mysqli_set_charset($con,"utf8");
    echo "Se ha establecido correctamente la conexión a la base de datos.<br><br>";

    if($crear == 'Crear') {

        $sql="INSERT INTO `clientes`(`dni`, `nombre`, `direccion`, `email`) 
        VALUES ('$dni','$nombre','$direccion','$email')";

        $consulta=mysqli_query($con,$sql);

        if(!$consulta){
            die("No se ha podido crear el cliente.");
        }else{
            echo "El cliente ha sido creado correctamente.";
        }

    }

    if($actualizar == 'Actualizar') {

                    $sql="UPDATE `clientes`
            SET `nombre` = '$nombre', `direccion` = '$direccion', `email` = '$email'
            WHERE `dni` = '$dni'";

            $consulta=mysqli_query($con,$sql);

            if(!$consulta){
                die("No se han podido actualizar los datos  del cliente.");
            }else{
                echo "Los datos del cliente han sido actualizados correctamente.";
            }

    }

    if($mostrar == 'Mostrar') {

        echo 'Información de los muebles:<br><br>';

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <table style='border: 1px solid black;'>
            <?php
                $sql2="SELECT * FROM `muebles`";
                $consulta=mysqli_query($con,$sql2);

                echo "<tr>";
                echo "<td style='border: 1px solid black;'>id</td>";
                echo "<td style='border: 1px solid black;'>color</td>";
                echo "<td style='border: 1px solid black;'>dimensiones</td>";
                echo "<td style='border: 1px solid black;'>tipo</td>";
                echo "<td style='border: 1px solid black;'>dni cliente</td>";
                echo "</tr>";

                while($fila=$consulta->fetch_assoc()){
                    echo "<tr>";
                    echo "<td style='border: 1px solid black;'>".$fila["id"]."</td>";
                    echo "<td style='border: 1px solid black;'>".$fila["color"]."</td>";
                    echo "<td style='border: 1px solid black;'>".$fila["dimensiones"]."</td>";
                    echo "<td style='border: 1px solid black;'>".$fila["tipo"]."</td>";
                    echo "<td style='border: 1px solid black;'>".$fila["dni_cliente"]."</td>";
                    echo "</tr>";
                }
            ?>
            </table>
        </body>
        </html>

        <?php

    }

    if($eliminar == 'Eliminar') {

        $sql="DELETE FROM `clientes` WHERE `dni` = '$dni'";

        $consulta=mysqli_query($con,$sql);

        if(!$consulta){
            die("No se ha podido eliminar el cliente.");
        }else{
            echo "El cliente ha sido eliminado correctamente.";
        }

    }

}
?>