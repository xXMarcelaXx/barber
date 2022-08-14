<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Guarda Categoria</title>
</head>
<body>
    <div class="container">

    <?php
    use barber\query\ejecuta;
    require("../../vendor/autoload.php");

    $insert =new ejecuta();

    extract($_POST);
    $cadena="INSERT INTO cat_productos
    VALUES('','$categoria')";

    $insert->ejecutar($cadena);
    echo "<div class='alert alert-success'> CATEGORIA REGISTRADO </div>";

    header("refresh:2; ../verCat.php");

    ?>

    </div>
    
</body>
</html>