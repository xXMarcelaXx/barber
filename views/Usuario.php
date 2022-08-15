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
    $fecha = date('d-m-Y');
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
          <li class="active"><a href="../views/Usuario.php"><i class="bi bi-person-fill"></i><span>Usuarios</span></a></li>
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
            <h1 class="text-center">Administracion Cuentas</h1>

            <div class="row">
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Nueva Cuenta
                    </button>
                </div>
                <div class="col-md-6">
                    <h5>Ingresa el periodo de la fecha de creacion de cuentas</h5>
                </div>

                <form action="#" method="POST">
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Fecha Incial</span>
                                <input type="date" name="FI" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Fecha Incial</span>
                                <input type="date" name="FF" class="form-control" required>
                                <button type="submit" class="btn btn-outline-secondary">Ver</button>
                            </div>

                        </div>
                    </div>

                </form>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Cuentas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../views/scripts/guardarusuario.php" method="POST">
                                    <!--Nombre de usuario-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                                <input type="text" class="form-control" required placeholder="Username" name="nombre_usuario">
                                            </div>
                                        </div>
                                        <!--contraseña-->
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                                <input type="password" class="form-control" required placeholder="contraseña" name="contraseña">
                                            </div>
                                        </div>
                                        <!--Nombre-->
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="nombre" required>
                                            </div>
                                        </div>
                                        <!--app-->
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Apellido Paterno" name="ap_paterno">
                                            </div>
                                        </div>
                                        <!--apm-->
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Apellido Materno" name="ap_materno">
                                            </div>
                                        </div>
                                        <!--Nombre-->
                                        <!--direccion-->
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></i></span>
                                                <input type="text" class="form-control" placeholder="Direccion/Calle" name="direccion">
                                            </div>
                                        </div>
                                        <!--Telefono-->
                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Numero de telefono" name="telefono" required>
                                            </div>
                                        </div>
                                        <!--correo-->
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                                <input type="email" class="form-control" placeholder="Correo Electronico" name="correo" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <?php


            require("../vendor/autoload.php");
            $consulta = new Select();
            if ($_POST) {
                extract($_POST);


                $cadena = "SELECT * FROM cuenta WHERE fecha_creacion BETWEEN '$FI' and '$FF'";
                $tabla = $consulta->seleccionar($cadena);
            ?>
                <h2>Clientes Exitentes</h2>
                <table class="table table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>telefono</th>
                            <th>correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tabla as $registro) {
                        ?>
                            <tr>
                                <td><?php echo $registro->nombre ?></td>
                                <td><?php echo $registro->ap_paterno ?> <?php echo $registro->ap_materno ?></td>
                                <td><?php echo $registro->direccion ?></td>
                                <td><?php echo $registro->telefono ?></td>
                                <td><?php echo $registro->correo ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>


        </div>


        <?php
  }
  else
  {
    echo"<h1>No se meta donde no le llaman perro</h1>";
  }
  ?>


    </main>
    <br>
</body>

</html>