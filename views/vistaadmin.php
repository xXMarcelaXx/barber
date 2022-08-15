<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.jpg">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../js/bootstrap.bundle.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Classic Cuts</title>
</head>
<?php

use barber\Query\Select;

require("../vendor/autoload.php");
session_start();
if($_SESSION['tipo_cuenta'] == 'Administrador'){
$query = new Select();

$cadena = "SELECT cuenta.nombre, concat(cuenta.nombre,' ',cuenta.ap_paterno,' ',cuenta.ap_materno)as completo,
         cuenta.direccion,cuenta.telefono,cuenta.correo FROM cuenta where cuenta.nombre_usuario='XxMarcelaXX'";

$tabla = $query->seleccionar($cadena);

foreach ($tabla as $row) {
  $nombre = $row->nombre;
  $completo = $row->completo;
  $direccion = $row->direccion;
  $telefono = $row->telefono;
  $email = $row->correo;
}
?>

<body>
  <?php
  $fecha = date('Y-m-d');
  ?>
  <!--Seccion de Encabezado-->
  <header id="header">
    <div class="d-flex flex-column">
      <div class="profile">
        <img src="../img/07d7a69e-0614-43d5-b6fe-294787c72b22.jfif" alt="" class="img-fluid rounded-circle mt-3">
        <h1 class="text-light"><a href="#"></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/profile.php?id=100063500375166" class="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/Classic.Cuts_Barberia/?fbclid=IwAR3gMkl_NnnES0o54LZS4fWnokOArjdW6ZnlnB3OPtGaO_Nc1Md9iKvevKE" class="Instagram"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
      <!--Menu de Navegacion-->
      <nav class="nav-menu" id="men">
        <ul>
          <li class="active"><a href="../views/vistaadmin.php"><i class="bi bi-house-door-fill"></i><span>Citas</span></a></li>
          <li><a href="../views/Usuario.php"><i class="bi bi-person-fill"></i><span>Usuarios</span></a></li>
          <li><a href="../views/Servicios.php"><i class="bi bi-bookmarks-fill"></i><span>Servicios</span></a></li>
          <li><a href="../views/verCat.php"><i class="bi bi-tags-fill"></i><span>Categoria</span></a></li>
          <li><a href="../views/Sugerencias.php"><i class="bi bi-chat-left-fill"></i><span>Sugerencias</span></a></li>
          <li><a href="../views/verPro.php"><i class="bi bi-bag-fill"></i></i><span>Productos</span></a></li>
          <li><a href="../views/pedidos.php"><i class="bi bi-list-ul"></i><span>Pedidos</span></a></li>
          <li><a href="../views/ventas.php"><i class="bi bi-currency-dollar"></i><span>ventas</span></a></li>
          <li><a href="../views/registrar.php"><i class="bi bi-card-checklist"></i><span>Registrar Venta</span></a></li>
          <li><a class="dropdown-item" href="scripts/cerrarSesion.php">Cerrar Session</a></li>
        </ul>
      </nav>
      <!--fine de menu de navegacion-->
      <div class="container mt-2 d-lg-none mobile-nav-toggle">

        <div class="dropdown dropend">
          <button type="button" class="btn  dropdown-toggle btn-outline-dark " data-bs-toggle="dropdown">
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../views/vistaadmin.php">Citas</a></li>
            <li><a class="dropdown-item " href="../views/Usuario.php">Usuarios</a></li><a class="dropdown-item " href="../views/Sugerencias.php">Sugerencias</a></li>
            <li><a class="dropdown-item " href="../views/Servicios.php">Servicios</a></li>
            <li><a class="dropdown-item " href="../views/verCat.php">Categoria</a></li>
            <li><a class="dropdown-item" href="../views/verPro.php">Productos</a></li>
            <li><a class="dropdown-item" href="../views/pedidos.php">Pedidos</a></li>
            <li><a class="dropdown-item" href="../views/ventas.php">Ventas</a></li>
            <li><a class="dropdown-item" href="../views/registrar.php">Registrar venta</a></li>
            <li><a class="dropdown-item" href="scripts/cerrarSesion.php">Cerrar Session</a></li>
            </a></li>
          </ul>
        </div>
      </div>

    </div>
  </header>
  <!--Fin de menu de navegacion-->
  <!--Hero Section-->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <div class="typing">
        <pre class="text-uppercase">Bienvenido</pre>
        <pre class="text-uppercase"><?php echo "Admin"; ?></pre>
      </div>
    </div>
  </section>
  <!--Tienda-->
  <br>
  <main id="main">

    <?php
    $DateAndTime = date('Y-m-d');
    $mesanterior = date('Y-m-d', strtotime('now -  1 month'));
    ?>
    <div class="container">
      <h1>Citas Esperadas hoy</h1>
      <?php



      require "../vendor/autoload.php";
      $query = new select();
      $cadena = "call barberia.CitasEsperadasDiarias('$DateAndTime');";
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
      $sentencia = "call barberia.CitasGananciasDiarias('$fecha');
        ";
      $total = $select->seleccionar($sentencia);
      foreach ($total as $ganancia) {
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
                  <li><a class="dropdown-item" href="../reportes/agendarcita.php">Agendar CIta</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<?php
}
else
{
  echo"<h1>No se meta donde no le llaman perro</h1>";
  header("refresh:3;scripts/cerrarSesion.php");
}

?>

  </main>
  <br>
</body>

</html>