<?php
session_start();
use barber\query\Citas;
require("../../vendor/autoload.php");
$cancelar = new Citas();
$cancelar -> CANCELAR();
header("location:../cita.php")
?>