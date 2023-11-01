<?php
// Configuración de la base de datos (ajusta esto según tu configuración)
$host = "localhost";
$db_usuario = "root";
$db_contrasena = "";
$nombre_db = "gestor_clientes";
$tabla = "servicios";

// Conectar a la base de datos
$conexion = new mysqli($host, $db_usuario, $db_contrasena);

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$abreviacion = $_POST["abreviacion"];
$precio = $_POST["precio"];

// Verificar la conexión
//if(!$conexion)
 //           {
 //               echo "No se ha podido conectar con el servidor" . mysql_error();
  //          }
  //  else
  //          {
//                echo "<b><h3>Hemos conectado al servidor</h3><b>" ;
 //           }
            


// Insertar datos en la base de datos
$sql = "INSERT INTO $tabla (nombre, abreviacion, precio) VALUES ('$nombre', '$abreviacion', '$precio')";

if ($conexion->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error al guardar datos: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
