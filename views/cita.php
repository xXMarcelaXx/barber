<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <title>Document</title>
    </head>
    <body>
        <?php session_start(); ?>
        <div class="container">
            <center>
                <H1>Citas</H1>
            </center>
            <div class="row">
                <div class="col-md-3">
                    <form action="../views/cita.php" method="POST">
                        <label for="fecha">Ingresa fecha "Año-Dia-Mes"</label>
                        <input type="date" name="fecha" id="fecha" class="form-select"><br>
                        <Button type="submit" class="btn btn-secondary" >Comprobar fecha</Button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="../views/script/agendarCita.php" method="POST">
                        <?php
                            $date = date('Y-m-d');
                            $fecha= $date;
                            use barber\query\Select;
                            require('../vendor/autoload.php');
                            
                            extract($_POST);
                            if($fecha >= $date) 
                            {
                            
                            $_SESSION['fecha'] = $fecha;
                            

                            $query = new Select();
                            $cadena = "SELECT id_horario, horarios from HORARIOS LEFT JOIN (SELECT id_horario IH ,hora_cita HC, fecha, horarios.horarios HH 
                            from citas inner join horarios on horarios.id_horario=citas.hora_cita where fecha='".$_SESSION['fecha']."' and citas.status='Pendiente')
                            as HF on horarios.id_horario = HF.IH  where HF.HH is null;";
                            
                            $reg = $query->seleccionar($cadena);
                            }                         

                            echo 
                            "<div class='mb-3'>
                                <label class='control-label'>
                                    horario
                                </label>
                                <select name='horario' class='form-select' required>
                                <option value=''>Selecciona un horario</option>";
                                

                            foreach ($reg as $value) {
                                if (!isset($value-> hora_cita)) 
                                {
                                    echo "<option value=" . $value-> id_horario . "'>" . $value-> horarios . "</option>";
                                }
                            }

                            echo 
                            "   </select>
                            </div>";
                        ?>

                        <?php
                            if($_POST == null or $fecha < $date)
                            {
                            echo
                            "<div class='col-md-3'>
                                <button type='submit' class ='btn btn-secondary' disabled>Agendar Cita</button>
                            </div>";
                            }
                            else
                            {
                            echo
                            "<div class='col-md-3'>
                                <button type='submit' class ='btn btn-secondary'>Agendar Cita</button>
                            </div>";
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>