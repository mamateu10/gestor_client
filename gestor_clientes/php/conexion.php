<?php
$host = "localhost";
$db_usuario = "root";
$db_contrasena = "";
$nombre_db = "gestor_clientes";

// Conexion segun la configuración
$conexion = new mysqli($host, $db_usuario, $db_contrasena, $nombre_db);

// Confirmación de conexión
// if(!$conexion){
//     echo "No se ha podido conectar con el servidor" . mysql_error();
// } else {
//     echo "<b><h3>Hemos conectado al servidor</h3><b>" ;
// };
?>