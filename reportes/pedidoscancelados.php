<?php
use barber\query\select;
require("../vendor/autoload.php");
$hoy=date('y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>PEDIDOS CANCELADOS</title>
</head>
<body>
    <div class="container"><br><br>
    <h1>Pedidos cancelados</h1>
    <div class="row">
    <div class="col-10 col-md-4">
        <label for="">Ingresa un periodo de busqueda:</label>
        
    <form action="#" method="post">
           <div class="form-row">
           <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Fecha Inicial</span>
              <input type="date" class="form-control" name="fechai" placeholder="FECHA INICIAL"required>
              </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Fecha Final</span>
              <input type="date" class="form-control" name="fechaf" placeholder="FECHA FINAL"required>
              <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" name="buscar">Buscar</button>
      </div>              
              </div>

           </div>
         </form><br>
      </div>
    </div>
    <div>
        
    <?php
if($_POST)
{
    extract($_POST);
            $con= new select();
            $cadena="SELECT CONI.id_ovproducto as 'FOLIO',CONCAT(CONI.CLIENTE,' ',CONI.paterno,' ',CONI.materno) AS 'Cliente',CONI.FECHA,CONI.SUBTOTAL, 
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
             AS CONI where CONI.Status='Cancelada'
            AND CONI.FECHA between '$fechai' and '$fechaf' ";
            $tabla=$con->seleccionar($cadena);
           
            echo"<table style='text-align:center' class='table table-hover'>
            <thead class='table-secondary'>
            <tr>
            <th>FOLIO</th>
            <th>FECHA</th>
            <th>CLIENTE</th>
            <th></th>
            </tr>
            </thead><tbody>";
           
            foreach($tabla as $registro)
            {
                echo "<tr>";
                echo "<td> $registro->FOLIO</td>";
                echo "<td> $registro->FECHA</td>";
                echo "<td> $registro->Cliente</td>";
                echo"</tr>";
            }
           
            echo "</tbody></table>";
        
    
}

?>
    </div>
    </div>
</body>
</html>