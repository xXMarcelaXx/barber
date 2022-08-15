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
    $ex = $_POST['existencia'];
    $insert =new ejecuta();

    extract($_POST);
$cadena="UPDATE productos SET nombre_producto='$nombre_producto',precio_compra=$precio_compra,
costo=$precio_venta,descripcion='$descripcion',existencia=$ex,cat_producto='$cat'
 WHERE id_producto='$id_producto'";

    $insert->ejecutar($cadena);
    echo "<div class='alert alert-success'> ACTUALIZADO </div>";

    header("refresh:2; ../verPro.php");

    ?>

    </div>
    
</body>
</html>