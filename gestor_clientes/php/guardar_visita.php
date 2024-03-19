<?php
//Importamos el codigo del documento de conexion con la base de datos
include("conexion.php")
?>

<!DOCTYPE html>
<html lang="es">
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
<form id="guardar_visita" action="#" method="post">
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
        //Cogemos los datos de la tabla cliente creando una consulta e insertandola en la base de datos
        $sqlcliente = "SELECT * from cliente order by nombre_cliente, apellidos";
        $insertarsql=mysqli_query($conexion, $sqlcliente);
        //Para cada uno de los valores crearemos una opción para el input de tipo "select" en el formulario
        while ($opcion=mysqli_fetch_array($insertarsql)){
            echo '<option value="'.$opcion['dni'].' '.$opcion['nombre_cliente'].' '.$opcion['apellidos'].' '.$opcion['observaciones'].'">'
                .$opcion['dni'].' '.$opcion['nombre'].' '.$opcion['apellidos'].' ('.$opcion['observaciones'].')</option>';
        }
        ?>

    </select>
    <br>
    <label for="servicios">Servicios:</label>

    <?php
    //Cogemos los datos de la tabla "servicio" creando una consulta e insertandola en la base de datos
    $sqlservicio = "SELECT * from servicio order by nombre_servicio";
    $insertarsqls=mysqli_query($conexion, $sqlservicio);
    //Para cada uno de los valores crearemos un input de tipo "checkbox" en el formulario
    while ($opcion=mysqli_fetch_array($insertarsqls)){
        echo '<label><input type="checkbox" id="'.$opcion["nombre_servicio"].'" name="'.$opcion["nombre_servicio"].'" value="'.$opcion["nombre_servicio"].'">'.$opcion["nombre_servicio"].'</label>';
    }
    ?>

    <br>
    <br>
    <input type="submit" name="guardar" value="Guardar">
    <br>
    <a href="../index.html" class="boton" id="volver">Inicio</a>
</form>
</body>
</html>

<?php
//En entregar el formulario se guardarán los datos con las siguientes instrucciones
if(isset($_POST["guardar"])) {
    //Guardamos los datos en la tabla visita
        //Cogemos los datos del formulario
        $fecha=$_POST["fecha"];
        $hora=$_POST["hora"];
        $fechahora=$fecha . " " . $hora . ":00";
        $cliente=substr($_POST["cliente"], 0, 9);
        //Creamos un insert con los datos e insertamos en la base de datos
        $sql="INSERT INTO visita (fecha, dni) VALUES ('$fechahora','$cliente')";
        $insertarsql=mysqli_query($conexion, $sql);
        //Comprovacion de la correcta inserción
        if ($insertarsql) {
            echo "Datos guardados correctamente en 'visita'";
        } else {
            echo "Errorr al guardar datos en 'visita': ".$conexion->error;
        }
    //Guardamos los datos en la tabla visita_servicio
        //Cogemos los datos de la tabla servicio creando una consulta he insertandola e insertandola a la base de datos
        $sqlservicio = "SELECT * from servicio order by nombre_servicio";
        $insertarsqls=mysqli_query($conexion, $sqlservicio);
        //Cogemos cada uno de los valores del apartado "servicios"
        while ($opcion=mysqli_fetch_array($insertarsqls)){
            $servicio=$opcion["nombre_servicio"];
            if(isset($_POST[$servicio])){
                //Si se ha marcado la checkbox de un servicio se creará un insert con los datos y se insertarán en la base de datos
                $sql="INSERT INTO visita_servicio (fecha, nombre_servicio) VALUES ('$fechahora', '$servicio')";
                $insertarsql=mysqli_query($conexion, $sql);
                //Confirmación de la correcta inserción
                if ($insertarsql) {
                    echo "Datos guardados correctamente en 'visita_servicio'";
                } else {
                    echo "Error al guardar datos en 'visita_servicio': ".$conexion->error;
                }
            }
        }
}
//Cerramos la conexion con la base de datos
$conexion->close();
?>