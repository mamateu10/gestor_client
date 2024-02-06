<?php
include("conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Guardar visita</title>
</head>
<body>
<header>
    <h1>Añadir visita nueva</h1>
</header>
<form id="crear_visita" action="#" method="post">
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha">
    <br>
    <label for="cliente">Cliente:</label>
    <select id="cliente" name="cliente">
        <option value="0">-</option>
        <?php
            $sqlcliente = "SELECT * from cliente order by nombre, apellidos";
            $insertarsql=mysqli_query($conexion, $sqlcliente);
            while ($opcion=mysqli_fetch_array($insertarsql)){
                echo '<option value="'.$opcion['dni'].' '.$opcion['nombre'].' '.$opcion['apellidos'].' '.$opcion['observaciones'].'">'
                    .$opcion['dni'].' '.$opcion['nombre'].' '.$opcion['apellidos'].' ('.$opcion['observaciones'].')</option>';
            }
        ?>
    </select>
    <br>
    <label for="servicios">servicios:</label>
    <input type="text" id="servicios" name="servicios">
    <br>
    <br>
    <input type="submit" name="guardar" value="Guardar">
</form>
</body>
</html>