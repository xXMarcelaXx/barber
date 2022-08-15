<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../js/bootstrap.js">
    <link rel="stylesheet" href=".././js/bootstrap.bundle.js">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php

        use barber\Query\ejecuta;

        require("../vendor/autoload.php");
        $insert = new ejecuta();
        extract($_POST);
        if($contraseña == $Ncontraseña)
{
        $cadena = "UPDATE cuenta SET contraseña='$contraseña',nombre='$nombre',ap_paterno='$ap_paterno',ap_materno='$ap_materno',direccion='$direccion',telefono='$telefono',correo='$correo',imagen_cuenta='$imagen',tipo_cuenta='Usuario',
        fecha_creacion=now()
         WHERE cuenta.nombre_usuario='$nombre_usuario'";

        $insert->ejecutar($cadena);        ?>

         <script> alert('Datos Guardados');</script>
        <?php
        header("refresh:3; ../views/profile2.php");
        }
        else{
           echo "echo <script> alert('contaseña incorecta');</script>";
        }
        ?>



    </div>
</body>

</html>