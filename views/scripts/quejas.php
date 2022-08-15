<?php
use  barber\Query\ejecuta;

include('../../vendor/autoload.php');
$insert= new ejecuta();

extract($_POST);
$cadena= "INSERT INTO quejas VALUES ('','$message','XxNadiaxX')";

 $insert->ejecutar($cadena);
  echo "<script> alert('Gracias');</script>";
   header ("refresh:3;  ../../views/profile2.php#contactanos");