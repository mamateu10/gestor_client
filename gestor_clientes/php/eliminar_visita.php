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
    <title>Eliminar visita</title>
</head>
<body>
<header>
    <h1>Eliminar visita existente</h1>
</header>
<form action="#" id="eliminar_visita" method="post">
    <label for="visitas">Selecciona una visita para borrar:</label>
    <select id="visitas" name="visitas">
        <?php
        //Cogemos todos los datos de las visitas creando una consulta e insertandola en la base de datos
        $sqlvisitas="SELECT 'v.fecha', 'c.dni', 'c.nombre_cliente', 'c.apellidos', 'c.observaciones', 'vs.nombre_servicio' from visita_servicio vs
            join visita v using (fecha)
            join cliente c using (dni)
            order by 'v.fecha'";
        $insertarsql=mysqli_query($conexion, $sqlvisitas);
        //Para cada una de las instancias creamos una opción para el "select" en el formulario
        while ($instancia=mysqli_fetch_array($insertarsql)){
            echo '<option value="'.$instancia["v.fecha"].' '.$instancia["c.dni"].' '.$instancia["c.nombre_cliente"].' '.$instancia["c.apellidos"].' '.$instancia["c.observaciones"].' '.$instancia["vs.nombre_servicio"].
                '" name="'.$instancia["fecha"].' '.$instancia["dni"].' '.$instancia["nombre_cliente"].' '.$instancia["apellidos"].' '.$instancia["observaciones"].' '.$instancia["nombre_servicio"].
                '" id="'.$instancia["fecha"].' '.$instancia["dni"].' '.$instancia["nombre_cliente"].' '.$instancia["apellidos"].' '.$instancia["observaciones"].' '.$instancia["nombre_servicio"].
                '">Fecha: '.$instancia["fecha"].' Datos del cliente: '.$instancia["dni"].' '.$instancia["nombre_cliente"].' '.$instancia["apellidos"].' '.$instancia["observaciones"].' Nombre servicio: '.$instancia["nombre_servicio"].'</option>';
        }

        ?>
    </select>
</form>
</body>
</html>