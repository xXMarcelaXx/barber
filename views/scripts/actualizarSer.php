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
    use barber\query\ejecuta;
    require("../../vendor/autoload.php");

    $insert =new ejecuta();

    extract($_GET);
$cadena="UPDATE servicios SET nombre_servicio='$nombre_servicio',descripcion='$descripcion',
costo='$costo' WHERE id_servicio='$id'";


    $insert->ejecutar($cadena);
    echo "<div class='alert alert-success'> ACTUALIZADO </div>";

    header("refresh:2; ../verPro.php");

    ?>

    </div>
    
</body>
</html>