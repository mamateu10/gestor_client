<?php
include ("conexion.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-Edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestor de clientes</title>
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
<body>
<header>
    <h1>Crear nuevo servicio</h1>
</header>

<form id="crear_servicios" action="#" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="abreviatura">Abreviatura (3 letras):</label>
    <input type="text" id="abrevitura" name="abreviatura">
    <br>
    <label for="precio">Precio:</label>
    <input type="decimal" id="precio" name="precio" ></input>
    <br>
    <br>
    <input type="submit" name="guardar" value="Guardar">
</form>

    <a href="../index.html" class="boton" id="volver">Inicio</a> 
</body>
</html>

<?php
// Obtener los datos del formulario
if(isset($_POST["guardar"])) {
    $nombre = $_POST["nombre"];
    $abreviatura = $_POST["abreviatura"];
    $precio = $_POST["precio"];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO servicio (nombre, abreviatura, precio)
        VALUES ('$nombre', '$abreviatura', '$precio')";
    $insertarsql = mysqli_query($conexion, $sql);
    if ($insertarsql) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar datos: " . $conexion->error;
    }
}
// Cerrar la conexión a la base de datos
$conexion->close();
?>
