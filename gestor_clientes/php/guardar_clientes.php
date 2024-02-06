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
    <h1>Crear nuevo cliente</h1>
</header>
    
<form id="crear_clientes" action="#" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos">
    <br>
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni">
    <br>
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono">
    <br>
    <label for="poblacion">Población:</label>
    <input type="text" id="poblacion" name="poblacion">
    <br>
    <label for="observaciones">Observaciones:</label>
    <textarea id="observaciones" name="observaciones" ></textarea>
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
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $telefono = $_POST["telefono"];
    $poblacion = $_POST["poblacion"];
    $observaciones = $_POST["observaciones"];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO cliente (nombre, apellidos, dni, telefono, poblacion, observaciones)
        VALUES ('$nombre', '$apellidos', '$dni', '$telefono', '$poblacion', '$observaciones')";
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