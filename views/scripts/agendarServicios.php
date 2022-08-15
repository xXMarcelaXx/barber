<?php
    extract($_POST);
    use barber\query\CITAS;

    require('../../vendor/autoload.php');
    session_start();

    $fecha = $_SESSION['fecha'];
    $horario = $_SESSION['horario'];

    $servicios = new CITAS();
    $servicios-> SERVICIO($serv1, $serv2);
    header("location:../profile2.php");
?>