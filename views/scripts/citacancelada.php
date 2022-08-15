<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>
<?php

use barber\Query\ejecuta;

require("../../vendor/autoload.php");
$id = $_GET['id'];
$insert = new ejecuta();

extract($_POST);
$cadena = "UPDATE citas SET Status='Cancelada'
WHERE id_citas='$id'";

$insert->ejecutar($cadena);
echo "<div class='alert alert-danger'> Cita Cancelada </div>";

header("refresh:2; ../../reportes/citaspendientes.php");
?>
</body>
</html>