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
          <li><a href="../views/vistaadmin.php"><i class="bi bi-house-door-fill"></i><span>Citas</span></a></li>
          <li><a href="../views/Usuario.php"><i class="bi bi-person-fill"></i><span>Usuarios</span></a></li>
          <li><a href="../views/Servicios.php"><i class="bi bi-bookmarks-fill"></i><span>Servicios</span></a></li>
          <li><a href="../views/verCat.php"><i class="bi bi-tags-fill"></i><span>Categoria</span></a></li>
          <li><a href="../views/Sugerencias.php"><i class="bi bi-chat-left-fill"></i><span>Sugerencias</span></a></li>
          <li class="active"><a href="../views/verPro.php"><i class="bi bi-bag-fill"></i></i><span>Productos</span></a></li>
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
      <h1 class="text-center">Productos</h1><br>
      <div class="row">
      </div>
      <div class="row">


        <div class="col-4 col-md-2">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            agregar producto
          </button>
        </div>

        <div class="col-3 col-md-2">
          <div class="input-group ">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Reportes</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../reportes/rproductos.php">Productos</a></li>
              <li><a class="dropdown-item" href="../reportes/pNoVendidos.php">Productos no vendidos</a></li>
              <li><a class="dropdown-item" href="../reportes/putilidad.php">Productos por utilidad</a></li>
          </div>
        </div>
        <div class="col-5 col-md-3">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Producto mas vendido
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Producto mas Vendido</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <?php
                  require("../vendor/autoload.php");
                  $pr = new select();
                  $pmas = "SELECT pmv.nombre_producto, max( pmv.cantidad) as 'cantidad_de_ventas' from
(select count(pv.id_producto) as cantidad, pv.nombre_producto from
(SELECT productos.nombre_producto, productos.id_producto from productos inner join detalle_ovproductos on 
detalle_ovproductos.producto=productos.id_producto
inner join orden_ventas_producto on orden_ventas_producto.id_ovproducto=detalle_ovproductos.ov_productos) as pv
group by id_producto ) as pmv";
                  $res = $pr->seleccionar($pmas);
                  foreach ($res as $mas) {
                    echo "<h4 class='aling center'>Nombre: " . $mas->nombre_producto . "</h4>";
                    echo "<h4 class='aling center'>Cantidad de ventas: " . $mas->cantidad_de_ventas . "</h4>";
                  }
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="scripts/guardaPro.php" method="post" enctype="multipart/form-data">
                  <div class="form-row ">
                    <div class="form-group">
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-wrench"></i></span>
                        <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre" required>
                      </div>

                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                        <input type="number" class="form-control" name="precio_compra" placeholder="Precio_compra" min="0" required>
                      </div>

                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                        <input type="number" class="form-control" name="precio_venta" placeholder="Precio venta" min="0" required>
                      </div>

                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-list-check"></i></span>
                        <input type="number" class="form-control" name="existencia" placeholder="Existencia" min="0" required>
                      </div>

                      <div class="input-group">
                        <span class="input-group-text">Descripcion</span>
                        <textarea class="form-control" name="descripcion"></textarea>
                      </div><br>

                      <div class="input-group mb-3">
                        <label for="">Ingresa foto</label>
                      </div>

                      <div class="input-group mb-3">
                        <input type="file" class="form-control" name="img" required>
                      </div>

                      <?php
                      $quer = new select();
                      $cadena = "SELECT id_catproducto, categoria FROM cat_productos";
                      $reg = $quer->seleccionar($cadena);

                      echo "<div class='mb-3'>
              <label class='control-label'>
              Categroria:
              </label>
              <select name='cat' class='form-select'>";
                      foreach ($reg as $value) {
                        echo "<option value='" . $value->id_catproducto . "'>" . $value->categoria . "</option>";
                      }
                      echo "</select>
              </div>";
                      ?>
                    </div><br>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-secondary">Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div>

          <form action="#" method="post">
            <div class="form-row">

              <div class="input-group">
                <span class="input-group-text" id="basic-addon1"> Categoria </span>
                <?php
                $query = new select();
                $cad = "SELECT id_catproducto, categoria FROM cat_productos";
                $reg = $query->seleccionar($cad);

                echo "<div >
                    <select name='cat' class='form-select'>";
                foreach ($reg as $value) {
                  echo "<option value='" . $value->id_catproducto . "'>" . $value->categoria . "</option>";
                }
                echo "</select>
                    </div>";
                ?>

                <button type="submit" class="btn btn-secondary">Buscar</button>

              </div>


            </div>
          </form>
        </div>
      </div><br>
      <div class="row">

        <?php
        if ($_POST) {
          extract($_POST);
          $consulta = new select();

          $cadena = "SELECT * FROM productos inner JOIN cat_productos on productos.cat_producto=cat_productos.id_catproducto
 where cat_productos.id_catproducto=$cat";
          $tabla = $consulta->seleccionar($cadena);

          echo "<table style='text-align:center' class='table table-hover'>
 <thead class='table-secondary'>
 <tr>
 <th>Nombre</th>
 <th>Categoria</th>
 <th>Precio Compra</th>
 <th>Precio Venta</th>
 <th>Existencia</th>
 <th>Descripción</th>
 <th>Editar</th>
 <th>Existencia</th>
 </tr>
 </thead><tbody>";

          foreach ($tabla as $registro) {
            echo "<tr>";
            echo "<td> $registro->nombre_producto</td>";
            echo "<td> $registro->categoria</td>";
            echo "<td> $registro->precio_compra</td>";
            echo "<td> $registro->costo</td>";
            echo "<td> $registro->existencia</td>";
            echo "<td> $registro->descripcion</td>";
        ?>
            <td><a href="editarPro.php?id=<?php echo $registro->id_producto ?>" class="btn btn-secondary">Editar</a></td>
            <?php
            ?>
            <td><a href="ingresaexistencia.php?id=<?php echo $registro->id_producto ?>" class="btn btn-secondary">Agregar</a></td>
        <?php
            echo "</tr>";
          }

          echo "</tbody></table>";
        }
        ?>
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