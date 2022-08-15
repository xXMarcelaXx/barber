<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Citas Esperadas</title>
</head>

<body>
    <?php
            use barber\Query\select;
    session_start();
    if($_SESSION['tipo_cuenta'] == 'Administrador'){
    $DateAndTime = date('Y-m-d');
    $mesanterior = date('Y-m-d', strtotime('now -  1 month'));
    ?>
    <div class="container">
        <h1>Citas Esperadas hoy</h1>
        <?php




        require "../vendor/autoload.php";
        $query = new select();
        $cadena = "call barberia.CitasEsperadasDiarias('2022-08-14');";
        $tabla = $query->seleccionar($cadena);
        ?>
        <table class='table-hover table'>
            <thead class='table-secondary'>
                <tr>
                    <th>Usuario</th>
                    <th>Hora</th>
                    <th>Servicios</th>
                    <th>Total a pagar</th>
                    <th>Status</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tabla as $registro) {
                ?>
                    <tr>
                        <td><?php echo $registro->cliente ?></td>
                        <td><?php echo $registro->hora ?></td>
                        <td><?php echo $registro->servicio ?></td>
                        <td><?php echo $registro->costo ?></td>
                        <td><a href="../views/scripts/actualizarcitashoy.php?id=<?php echo $registro->cita ?>" class="btn btn-secondary">Finalizar</a></td>
                        <td><a href="../reportes/detallecitashoy.php?id=<?php echo $registro->cita ?>" class="btn btn-secondary">Detalles</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <h3>Datos Extra</h3>
        <?php
        $select = new select();
        $sentencia = "call barberia.CitasGananciasDiarias('2022-07-11');
        ";
        $total = $select->seleccionar($sentencia);
        foreach ($total as $ganancia) {
        }

        $cc = new select();
        $cad = "call barberia.CitasGananciasDiarias('$mesanterior')";
        $mesanterior = $cc->seleccionar($cad);
        foreach ($mesanterior as $m) {
        }

        ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Gancias</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Esperadas hoy</h6>
                        <p class="card-text"><?php echo '$' . $ganancia->Ganancias ?></p>
                        <p>Fecha: <?php echo $DateAndTime ?></p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mas Sobre Citas
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../reportes/citaspendientes.php">Ver Citas Pendientes</a></li>
                                <li><a class="dropdown-item" href="../reportes/citascanceladas.php">Ver Citas Canceladas</a></li>
                                <li><a class="dropdown-item" href="../reportes/citasfinalizadas.php">Ver Citas Finalizada</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
  }
  else
  {
    echo"<h1>No se meta donde no le llaman perro</h1>";
    header("refresh:3;scripts/cerrarSesion.php");
  }
  ?>
</html>