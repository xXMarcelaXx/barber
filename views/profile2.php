<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../img/logo.jpg">
  <link rel="stylesheet" href="../css/2perfil2.css">
  <link rel="stylesheet" href="../js/bootstrap.bundle.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>Classic Cuts</title>
</head>
<?php
extract($_POST);
$FI='';
$FF='';
$_SESSION['usuario'] = 'Hira';
$_SESSION['FF']=$FF;
$_SESSION['FI']=$FI;

use barber\Query\ejecuta;
use barber\Query\Select;

include '../carrito/carrito.php';
require("../vendor/autoload.php");

$query = new Select();

$cadena = "SELECT cuenta.nombre, concat(cuenta.nombre,' ',cuenta.ap_paterno,' ',cuenta.ap_materno)as completo,
         cuenta.direccion,cuenta.telefono,cuenta.correo FROM cuenta where cuenta.nombre_usuario='Hira'";

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
        <img src="../../Bootstrap/IMG/R.jfif" alt="" class="img-fluid rounded-circle mt-3">
        <h1 class="text-light"><a href="#"></a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/profile.php?id=100063500375166" class="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/Classic.Cuts_Barberia/?fbclid=IwAR3gMkl_NnnES0o54LZS4fWnokOArjdW6ZnlnB3OPtGaO_Nc1Md9iKvevKE" class="Instagram">
            <i class="bi bi-instagram"></i></a>
        </div>
      </div>
      <!--Menu de Navegacion-->
      <nav class="nav-menu" id="men">
        <ul>
          <li class="active"><a href="#"><i class="bi bi-house-door-fill"></i><span>Home</span></a></li>
          <li><a href="#productos"><i class="bi bi-shop"></i><span>Tienda</span></a></li>
          <li><a href="#citas"><i class="bi bi-calendar-event-fill"></i><span>Citas</span></a></li>
          <li><a href="#historial"><i class="bi bi-clock-history"></i></i><span>Pedidos</span></a></li>
          <li><a href="#perfil"><i class="bi bi-person-fill"></i><span>Perfil</span></a></li>
          <li><a href="#contactanos"><i class="bi bi-envelope-fill"></i><span>Contactanos</span></a></li>
          <li><a href="scripts/cerrarSesion.php"><i class="bi bi-door-closed-fill"></i><span><button type="button" class="btn btn-outline-warning">Cerrar Sesion</button></span></a></li>


        </ul>
      </nav>
      <!--fine de menu de navegacion-->
      <div class="container mt-3 d-lg-none mobile-nav-toggle">

        <div class="dropdown dropend">
          <button type="button" class="btn  dropdown-toggle btn-outline-dark " data-bs-toggle="dropdown">
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Home</a></li>
            <li><a class="dropdown-item " href="#productos">Tienda</a></li>
            <li><a class="dropdown-item " href="#citas">Citas</a></li>
            <li><a class="dropdown-item " href="#perfil">Perfil</a></li>
            <li><a class="dropdown-item" href="#historial">Pedidos</a></li>
            <li><a class="dropdown-item" href="#contactanos">Contactanos</a></li>
            <li><button>Cerrar Sesion</button></li>

          </ul>
        </div>ƒ
      </div>

    </div>
  </header>
  <!--Fin de menu de navegacion-->
  <!--Hero Section-->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <div class="typing">
        <pre class="text-uppercase">Bienvenido</pre>
        <pre class="text-uppercase"><?php echo "$nombre"; ?></pre>
      </div>
    </div>
  </section>
  <!--Tienda-->
  <br>
  <main id="main">

    <section id="productos" class="productos">
      <div class="container">
        <div class="container">
          <h2>Tienda</h2>

          <div class="col-md-3">
            <!-- Button trigger modal -->
            <a href="../carrito/mostrarcarrito.php" type="button" class="btn btn-dark"><i class="bi bi-cart-fill">
              </i>(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</a>


            <br>
          </div>
        </div>

        <br>
        <div class="container">

          <div class="d-flex justify-content-center row">
            <?php


            require("../vendor/autoload.php");

            $query3 = new Select();
            $cadena3 = "SELECT * from productos";
            $producto = $query3->seleccionar($cadena3);

            foreach ($producto as $pro) {
              $producto_nom = $pro->nombre_producto;
              $descripcion = $pro->descripcion;
              $precio = $pro->costo;
              #$img=$pro->imagene;
              $id = $pro->id_producto;
              $existencia = $pro->existencia;

            ?>

              <div class="container">
                <div class="row p-2 bg-white border rounded">
                  <div class="col-md-3 mt-1"><img data-toggle="popover" class="img-fluid img-responsive rounded product-image" src="<?php echo $img; ?>">
                  </div>
                  <div class="col-md-6 mt-1">
                    <h5><?php echo $producto_nom; ?></h5>
                    <div class="d-flex flex-row ratings mt-2 text-warning">
                      <p class="text-justify"><?php echo $descripcion; ?><br><br></p>

                    </div>
                  </div>
                  <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                      <h4 class="mr-1">$<?php echo $precio; ?></h4>
                    </div>
                    <h6 class="text-success">Recoger en tienda!</h6>
                    <div class="d-flex flex-column mt-4">
                      <form action="" method="POST">
                        <input type="hidden" name="existencia" id="existencia" value=" <?php echo $existencia; ?>">
                        <input type="hidden" name="id" id="id" value=" <?php echo $id; ?>">
                        <input type="hidden" name="nombre" id="nombre" value=" <?php echo $producto_nom; ?>">
                        <input type="hidden" name="precio" id="precio" value=" <?php echo $precio; ?>">
                        <input type="number" name="cantidad" id="cantidad" value="" min="0" max='<?php echo $existencia; ?>'><br>
                        <button class="btn btn-outline-primary btn-sm mt-1" name="accion" value="agregar" type="submit"> Añadir </button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            <?php } ?>




          </div>
    </section>
    <br>
    <hr>

    <!--Citas-->
    <div id="citas" class="container">
      <section>
        <h2>Citas</h2>
        <br>
        <div class="row">
          <div class="col-md-3">
            <form action="profile2.php#citas" method="POST">
              <h5><label for="fecha">Ingresa fecha "Año-Dia-Mes"</label></h5>
              <input type="date" name="fecha" id="fecha" class="form-select" required><br>
              <Button type="submit" class="btn btn-outline-info btn-lg btn-block">Comprobar fecha</Button>
            </form>
          </div>
          <div class="col-md-3">
            <form action="scripts/agendarCita.php" method="POST">
              <?php
              $date = date('Y-m-d');
              $fecha = $date;
              require('../vendor/autoload.php');

              extract($_POST);
              if ($fecha >= $date) {

                $_SESSION['fecha'] = $fecha;


                $query = new Select();
                $cadena = "SELECT id_horario, horarios from HORARIOS LEFT JOIN (SELECT id_horario IH ,hora_cita HC, fecha, horarios.horarios HH 
                            from citas inner join horarios on horarios.id_horario=citas.hora_cita where fecha='" . $_SESSION['fecha'] . "' and citas.status='Pendiente')
                            as HF on horarios.id_horario = HF.IH  where HF.HH is null;";

                $reg = $query->seleccionar($cadena);
              }

              echo
              "<div class='md-3'>
                                <label class='control-label'>
                                  <h5>Horarios</h5>
                                </label>
                                <select name='horario' class='form-select' required>
                                <option value=''>Selecciona un horario</option>";


              foreach ($reg as $value) {
                if (!isset($value->hora_cita)) {
                  echo "<option value=" . $value->id_horario . "'>" . $value->horarios . "</option>";
                }
              }

              echo
              "   </select>
                            </div><br>";
              ?>

              <?php
              if ($_POST == null or $fecha < $date) {
                echo
                "<div class='col-md-12'>
                                <button type='submit' class ='btn btn-outline-info btn-lg btn-block' disabled>Agendar Cita</button>
                            </div>";
              } else {
                echo
                "<div class='col-md-12'>
                                <button type='submit' class ='btn btn-outline-info btn-lg btn-block'>Agendar Cita</button>
                            </div>";
              }
              ?>
            </form>

          </div>
      </section>

    </div>
    </div>
    <br>
    <hr>
    <div class="container" id="historial">
      <section>
        <h2>Informacion de Ordenes</h2>
        <br>
        <form action="profile2.php#historial" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Incial</span>
                <input type="date" class="form-control" placeholder="Fecha Incial" aria-label="Username" aria-describedby="basic-addon1" name="FI">
              </div>
            </div>
            <div class="col-md-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Final</span>
                <input type="date" class="form-control" placeholder="Fecha Final" aria-label="Username" aria-describedby="basic-addon1" name="FF">

              </div>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-outline-secondary">Ver</button>
            </div>
          </div>
        </form>

        <?php
        require("../vendor/autoload.php");
        $query4 = new Select();
        $cadena2 = "CALL barberia.OrdenClientePeriodo('". $_SESSION['FI'] ."','". $_SESSION['FF'] ."', 'Hira')";
        $tabla = $query4->seleccionar($cadena2);


        ?>
        <?php

        ?>
        <table class='table-hover table'>
          <thead class='table-dark'>
            <tr>
              <th>Folio</th>
              <th>Producto</th>
              <th>Fecha</th>
              <th>Costo</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($tabla as $registro) {
            ?>
              <tr>
                <td><?php echo $registro->id_ovproducto ?></td>
                <td><?php echo $registro->nombre_producto ?></td>
                <td><?php echo $registro->ovp_fecha ?></td>
                <td><?php echo $registro->costo ?></td>
                <td><?php echo $registro->total ?></td>
              </tr>
            <?php
            

                  }        ?>
          </tbody>
        </table>


      </section>
    </div>
    <hr>
    <!--Perfil-->
    <br>
    <div id="perfil" class="container ">

      <section>
        <h2>Perfil</h2>
        <div class="container">
          <?php

          require "../vendor/autoload.php";
          $query = new select();
          $cadena = "SELECT * FROM cuenta WHERE cuenta.nombre_usuario = 'Hira'";
          $tabla = $query->seleccionar($cadena);
          foreach ($tabla as $reg) {
          }
          ?>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="container">
              <div class="card" style="width: 30rem;">
                <div class="card-body">
                  <h5 class="card-title">Informacion</h5>
                  <form action="#" method="POST">
                    <div class="row">
                      <!--Nombre de usuario-->
                      <!--ssss-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Username" name="nombre_usuario" value="<?php echo $reg->nombre_usuario ?>
                                        ">
                        </div>
                      </div>
                      <!--contraseña-->
                      <!--Nombre-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Ingresa tu nombre" name="nombre" value="<?php echo $reg->nombre ?>
                                        ">
                        </div>
                      </div>
                      <!--app-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Apellido Paterno" name="ap_paterno" value="<?php echo $reg->ap_paterno ?>
                                        ">
                        </div>
                      </div>
                      <!--apm-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Apellido Materno" name="ap_materno" value="<?php echo $reg->ap_materno ?>
                                        ">
                        </div>
                      </div>
                      <!--direccion-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></i></span>
                          <input type="text" class="form-control" disabled placeholder="Direccion/Calle" name="direccion" value="<?php echo $reg->direccion ?>
                                        ">
                        </div>
                      </div>
                      <!--Telefono-->
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                          <input type="text" class="form-control" disabled placeholder="Numero de telefono" name="telefono" value="<?php echo $reg->telefono ?>
                                        ">
                        </div>
                      </div>
                      <!--correo-->
                      <div class="col-md-12">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                          <input type="email" class="form-control" disabled placeholder="Correo Electronico" name="correo" value="<?php echo $reg->correo ?>
                                        ">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <!-- Button trigger modal -->
                        <a href="editarcliente.php?id=<?php echo $reg->nombre_usuario ?>" class="btn btn-outline-secondary">Modificar Datos</a>

                      </div>
                  </form>
                  <!--sueldo-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <br>
    </div>

    <br>
    <!--Contacto-->
    <hr>
    <br>
    <div id="contactanos" class="container ">
      <section>
        <h2>Quejas y Sugerencias</h2>

        <div class="mt-5 conatiner">
          <div class="text-center ">
            <h3 class="text-dark">¿Como podemos ayudarte?</h3>
          </div>
          <div class=" d-flex align-items-center justify-content-center">
            <div class="bg-white col-md-4">
              <div class="p-4 rounded shadow-md">
                <div class="mt-3 mb-3">
                  <form action="../views/script/quejas.php" method="POST">
                    <label for="message" class="form-label">Quejas o Sugerencias</label>
                    <textarea name="message" cols="20" rows="6" class="form-control" placeholder="Escribe"></textarea>
                    <br>
                    <button class="btn btn-dark" type="submit"> Enviar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
    </div>

  </main>
  <br>
</body>

</html>