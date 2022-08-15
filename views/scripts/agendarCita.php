<?php
    extract($_POST);
    use barber\query\CITAS;

    require('../../vendor/autoload.php');
    session_start();

    $fecha = $_SESSION['fecha'];
    $_SESSION['horario'] = $horario;

    $cita = new CITAS();
    $cita-> CITA_US($fecha, $horario);

    header('location:../registrarServicios.php');
?>