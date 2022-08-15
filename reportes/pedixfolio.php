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

        <?php
        require("../vendor/autoload.php");
        ?>
        <div class="container"><br><br>
            <?php
            extract($_POST);
            $con = new select();
            $cadena = "SELECT CONI.id_ovproducto as 'FOLIO',CONCAT(CONI.CLIENTE,' ',CONI.paterno,' ',CONI.materno) AS 'Cliente',CONI.FECHA,CONI.SUBTOTAL, 
            CONI.IVA AS 'IVA', CONI.TOTAL AS 'Monto_con_IVA',CONI.Status,CONI.FECHA FROM
            (SELECT cuenta.nombre AS 'CLIENTE', cuenta.ap_paterno AS 'paterno', cuenta.ap_materno AS 'materno',
            cuenta.nombre_usuario, SUM(productos.costo*detalle_ovproductos.cantidad) AS 'SUBTOTAL',
            SUM((productos.costo*detalle_ovproductos.cantidad)*1.16) AS 'TOTAL',
            SUM((productos.costo*detalle_ovproductos.cantidad)*0.16) AS 'IVA',
            orden_ventas_producto.ovp_fecha AS 'FECHA',orden_ventas_producto.id_ovproducto,orden_ventas_producto.Status FROM cuenta 
            inner JOIN orden_ventas_producto on orden_ventas_producto.Usuario_ovp = cuenta.nombre_usuario
            INNER JOIN detalle_ovproductos on detalle_ovproductos.id_DetalleProductos = orden_ventas_producto.id_ovproducto
            INNER JOIN productos on productos.id_producto = detalle_ovproductos.producto
            INNER JOIN cat_productos on cat_productos.id_catproducto = detalle_ovproductos.ov_productos GROUP by orden_ventas_producto.id_ovproducto)
            as CONI
            where CONI.id_ovproducto=$folio and CONI.Status='Pendiente' ";
            $tabla = $con->seleccionar($cadena);
            if ($tabla == null) {
                echo "<div class='alert alert-danger'>FOLIO NO ENCONTRADO</div>";

            } else {

                echo "<table style='text-align:center' class='table table-hover'>
            <thead class='table-secondary'>
            <tr>
            <th>FOLIO</th>
            <th>FECHA</th>
            <th>CLIENTE</th>
            <th>SUBTOTAL</th>
            <th>IVA</th>
            <th>MONTO CON IVA</th>
            </tr>
            </thead><tbody>";

                foreach ($tabla as $registro) {
                    echo "<tr>";
                    echo "<td> $registro->FOLIO</td>";
                    echo "<td> $registro->FECHA</td>";
                    echo "<td> $registro->Cliente</td>";
                    echo "<td>$ $registro->SUBTOTAL</td>";
                    echo "<td>$ $registro->IVA</td>";
                    echo "<td>$ $registro->Monto_con_IVA</td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
            }




            ?>

        </div>



    </main>
    <br>
</body>

</html>