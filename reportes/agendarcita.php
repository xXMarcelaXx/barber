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

use barber\Query\select;

require("../vendor/autoload.php");
?>
<body>
  <?php
  session_start();
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
          <li><a href="../views/vistaadmin.php"><i class="bi bi-house-door-fill"></i><span>Citas</span></a></li>
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
          </ul>
        </div>
      </div>

    </div>
  </header>
  <!--Fin de menu de navegacion-->
  <!--Hero Section-->
  <!--Tienda-->
  <br>
  <main id="main">

        <div class="container">
            <center>
                <H1>Agendar Cita</H1>
            </center>
            <div class="row">
                <div class="col-md-3">
                    <form action="agendarcita.php" method="POST">
                        <h6><label for="fecha">Ingresa fecha "Año-Dia-Mes"</label></h6>
                        <input type="date" name="fecha" id="fecha" class="form-select" required><br>
                        <Button type="submit" class="btn btn-secondary" >Comprobar fecha</Button>
                    </form>
                </div>
                <div class="col-md-3">
                    <form action="../views/scripts/agendarCita.php" method="POST">
                        <?php
                            $date = date('Y-m-d');
                            $fecha= $date;
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
                            "<div class='md-3'>
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



  </main>
  <br>
</body>

</html>