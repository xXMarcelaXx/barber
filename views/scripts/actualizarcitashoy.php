<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <title>Document</title>
</head>
<body>
        
</body>
</html>
        <?php

        use barber\Query\ejecuta;

        require("../../vendor/autoload.php");
        $id = $_GET['id'];
        $insert = new ejecuta();

        extract($_POST);
        $cadena = "UPDATE citas SET Status='Finalizada'
        WHERE id_citas='$id'";

        $insert->ejecutar($cadena);
        echo "<div class='alert alert-success'><h4> Cita Finalizada </h4></div>";

        header("refresh:2; ../vistaadmin.php");

        ?>