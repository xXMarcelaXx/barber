<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">

        <?php

        use barber\Query\ejecuta;

        require("../../vendor/autoload.php");

        $insert = new ejecuta();
        extract($_POST);
        $cadena = "UPDATE servicios SET nombre_servicio='$nombre_servicio',costo='$costo',descripcion='$descripcion' 
        WHERE id_servicio=$id_servicio";


        $insert->ejecutar($cadena);
        echo "<div class='alert alert-success'> Servicio Actualizado </div>";

        header("refresh:2; ../Servicios.php");

        ?>

    </div>

</body>

</html>