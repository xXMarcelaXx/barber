<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../js/bootstrap.js">
    <link rel="stylesheet" href="../../js/bootstrap.bundle.js">
    <script type="text/javascript" src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php

        use barber\Query\ejecuta;

        require("../../vendor/autoload.php");
        $insert = new ejecuta();
        extract($_POST);
        $cadena = "INSERT INTO servicios VALUES('','$nombre_servicio','$descripcion','$costo')";

        $insert->ejecutar($cadena);
        ?>

        <div class='alert alert-success'>
            SERVICIO REGISTRADO</div>
        <?php
        header("refresh:2; ../Servicios.php");
        ?>
    </div>
</body>

</html>