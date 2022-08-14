<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Existencias</title>
</head>
<body>
    <div class="container">

    <?php
    use barber\query\ejecuta;
    require("../../vendor/autoload.php");
    $insert =new ejecuta();

    extract($_POST);
    $total=$pas+$existencia;
$cadena="UPDATE productos SET existencia=$total WHERE id_producto='$id_producto'";

    $insert->ejecutar($cadena);
    echo "<div class='alert alert-success'> Agregado </div>";

    header("refresh:2; ../verPro.php");
    ?>

    </div>
    
</body>
</html>