<?php
namespace barber\Query;
use barber\query\ejecuta;
use barber\query\select;

class Citas
{
    public function CITA($fecha, $horario)
    {
        $insert = new ejecuta();
        $cadena = "INSERT INTO citas(Usuario_c, fecha, hora_cita, Status) VALUES('Invitado','$fecha',".intval($horario).",'Pendiente')";
        $insert->ejecutar($cadena);
    }
    public function SERVICIO($serv1,$serv2)
    {
        $fechas = $_SESSION['fecha'];
        $horario = $_SESSION['horario'];
        $select = new select();

        $cadena1="SELECT id_citas FROM citas where fecha='$fechas' and hora_cita=".intval($horario)."";

        $uwu = $select-> seleccionar($cadena1);
        foreach($uwu as $owo)
        {
        
        $ejecutar = new ejecuta();
        $query = "INSERT INTO servicio_cita(dt_cita, servicio_sc) values('".$owo->id_citas."',".intval($serv1)." )";
        $ejecutar->ejecutar($query);
        }
        if($serv2!='Ninguno')
        {
            $ejecutar2 = new ejecuta();
            $query2 = "INSERT INTO servicio_cita(dt_cita, servicio_sc) values('".$owo->id_citas."',".intval($serv2)." )";
            $ejecutar2->ejecutar($query2);
        }

    }
    public function CANCELAR()
    {
        $fechas = $_SESSION['fecha'];
        $horario = $_SESSION['horario'];
        $select = new select();

        $cadena1="UPDATE CITAS set Status='Cancelada' where fecha='$fechas' and hora_cita=".intval($horario)."";
        $select ->seleccionar($cadena1);
    }
    public function CITA_US($fecha, $horario)
    {
        $insert = new ejecuta();
        $cadena = "INSERT INTO citas(Usuario_c, fecha, hora_cita, Status) VALUES('".$_SESSION['usuario']."','$fecha',".intval($horario).",'Pendiente')";
        $insert->ejecutar($cadena);
    }
}
?>