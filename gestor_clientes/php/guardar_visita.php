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
    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora">
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
    <select id="servicios" name="servicios" multiple>
        <option value="0">-</option>
        <?php
            $sqlservicio = "SELECT * from servicio order by nombre";
            $insertarsql=mysqli_query($conexion, $sqlservicio);
            while ($opcion=mysqli_fetch_array($insertarsql)){
                echo '<option value="'.$opcion["nombre"].'">'.$opcion["nombre"].'</option>';
            }
        ?>
    </select>
    <br>
    <br>
    <input type="submit" name="guardar" value="Guardar">
    <br>
    <a href="../index.html" class="boton" id="volver">Inicio</a>
</form>
</body>
</html>

<?php
if(isset($_POST["guardar"])) {
    $fecha=$_POST["fecha"];
    $hora=$_POST["hora"];
    $fechahora=$fecha . " " . $hora . ":00";
    $cliente=substr($_POST["cliente"], 0, 9);
    $servicios=$_POST["servicios"];
    
    $sql="INSERT INTO visita (fecha, cliente, servicios) VALUES ('$fechahora','$cliente','$servicios')";
    $insertarsql=mysqli_query($conexion, $sql);
    if ($insertarsql) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar datos: " . $conexion->error;
    }
}

$conexion->close();
?>