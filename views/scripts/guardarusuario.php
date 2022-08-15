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
        $date = date('Y-m-d');

        use barber\Query\ejecuta;
        use barber\Query\select;

        require("../../vendor/autoload.php");
        $insert = new ejecuta();

        extract($_POST);
        if ($nombre_usuario) {
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);
            $TP = "Usuario";

            $cadena = "INSERT INTO cuenta VALUES('$nombre_usuario','$hash','$nombre','$ap_paterno','$ap_materno','$direccion','$telefono','$correo','','$TP','$date')";

            $insert->eje($cadena);
        ?>

        <?php
        }
        header("refresh:3 ../Usuario.php");
        ?>

    </div>
</body>

</html>