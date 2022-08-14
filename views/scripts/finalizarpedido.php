<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>FINALIZAR PEDIDO</title>
</head>
<body>
    <div class="container">

    <?php
    use barber\query\ejecuta;
    require("../../vendor/autoload.php");

    $insert =new ejecuta();

    extract($_GET);
$cadena="UPDATE orden_ventas_producto SET Status='Finalizada' 
where orden_ventas_producto.id_ovproducto='$id'";


    $insert->ejecutar($cadena);
    echo "<div class='alert alert-success'> FINALIZADA </div>";

    header("refresh:2; ../pedidos.php");

    ?>

    </div>
    
</body>
</html>