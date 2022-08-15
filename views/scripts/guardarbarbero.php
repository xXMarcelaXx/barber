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
        $TP = "Barbero";
        $cadena = "INSERT INTO cuenta VALUES('$nombre_usuario','$contraseña','$nombre','$ap_paterno','$ap_materno','$direccion','$telefono','$correo','$TP')";

        $insert->ejecutar($cadena);

        $cuenta_B = $nombre_usuario;
        $cadena2 = "INSERT INTO barberos VALUES('','$cuenta_B',$Sueldo)";

        $insert->ejecutar($cadena2);
        ?>

        <div class='alert alert-success'>
            BARBERO REGISTRADO</div>
        <?php
        header("refresh:3; ../../index.php");
        ?>
    </div>
</body>

</html>