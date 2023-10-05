<?php

//session_start();



$color = $_GET['Color'];
$tipo = $_GET['Tipo'];
$dimensiones = $_GET['Dimensiones'];

//$_SESSION["nick_logueado"]=$color;

echo "El color es ".$color." el tipo es ".$tipo." y las dimensiones son ".$dimensiones;

$servidor="localhost";
$usuario="root";
$password="";
$bd="act1";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if(!$con){
    die("No se ha podido realizar la conexión_".mysqli_connect_error()."<br>");
}else{
    mysqli_set_charset($con,"utf8");
    echo "Se ha establecido correctamente la conexión a la base de datos";

    $sql="INSERT INTO `muebles`(`id`, `color`, `dimensiones`, `tipo`) 
    VALUES (NULL,'$color','$dimensiones','$tipo')";
    
    $consulta=mysqli_query($con,$sql);

    if(!$consulta){
        die("No se ha podido realizar el insert");
    }else{
        echo "El insert se ha realizado correctamente";
    }
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

    <table>
    <?php
        $sql2="SELECT * FROM `muebles`";
        $consulta=mysqli_query($con,$sql2);
        while($fila=$consulta->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$fila["id"]."</td>";
            echo "<td>".$fila["color"]."</td>";
            echo "<td>".$fila["dimensiones"]."</td>";
            echo "<td>".$fila["tipo"]."</td>";
            echo "</tr>";
        }
    ?>
    </table>

    <form action="/logout.php" method="post">

    <input type="submit" value="Enviar">
</form>
</body>
</html>

<?php
}
?>