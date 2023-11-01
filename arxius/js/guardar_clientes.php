<?php
// Configuración de la base de datos (ajusta esto según tu configuración)

$host = "localhost";
$db_usuario = "root";
$db_contrasena = "";
$nombre_db = "gestor_clientes";
$tabla = "clientes";

// Conectar a la base de datos
$conexion = new mysqli($host, $db_usuario, $db_contrasena);

// Obtener los datos del formulario
$datosform = $_POST['crear_clientes'];
// $nombre = $_POST["nombre"];
// $apellidos = $_POST["apellidos"];
// $dni = $_POST["dni"];
// $telefono = $_POST["telefono"];
// $poblacion = $_POST["poblacion"];
// $observaciones = $_POST["observaciones"];

// Verificar la conexión
if(!$conexion)
            {
                echo "No se ha podido conectar con el servidor" . mysql_error();
            }
    else
            {
                echo "<b><h3>Hemos conectado al servidor</h3><b>" ;
            }
            


// // Insertar datos en la base de datos
// $sql = "INSERT INTO $tabla (nombre, apellidos, dni, telefono, poblacion, observaciones) VALUES ('$nombre', '$apellidos', '$dni', '$telefono', '$poblacion', '$observaciones')";

// if ($conexion->query($sql) === TRUE) {
//     echo "Datos guardados correctamente.";
// } else {
//     echo "Error al guardar datos: " . $conexion->error;
// }

// // Cerrar la conexión a la base de datos
// $conexion->close();
?>
