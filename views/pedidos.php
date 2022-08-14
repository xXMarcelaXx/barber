<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <title>Pedidos</title>
</head>
<body>
    <div class="container"><br>
        <div class="row">
            <div class="col-3 col-md-3">
            <a href="../reportes/otrospedidos.php" class="btn btn-outline-secondary">Otros pedidos</a>
            </div>
            <div class="col-3 col-md-3">
            <a href="../reportes/pedidoscancelados.php" class="btn btn-outline-secondary">Pedidos Cancelados</a>
            </div>
            
      <div class="col-4 col-md-3">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Buscar por folio
</button>
</div><br><br>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresa el folio del pedido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../reportes/pedixfolio.php" method="post">
           <div class="form-row ">
             <div class="form-group">

              <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-list-check"></i></span>
              <input type="number" class="form-control" name="folio" placeholder="Folio.." min="1" required>
              </div>
             </div><br>
             <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-secondary">Buscar</button>
      </div>
           </div>
         </form>
      </div>
    </div>
  </div>
</div>
        </div>
    <?php
use barber\query\select;
require("../vendor/autoload.php");
 $consulta= new select();
 echo "<h1>Pedidos pendientes para hoy</h1>";
 $fecha=date('Y-m-d');
 $cadena="SELECT CONI.id_ovproducto as 'FOLIO',CONCAT(CONI.CLIENTE,' ',CONI.paterno,' ',CONI.materno) AS 'Cliente',CONI.FECHA,CONI.SUBTOTAL, 
 CONI.IVA AS 'IVA', CONI.TOTAL AS 'Monto_con_IVA',CONI.Status FROM
 (SELECT cuenta.nombre AS 'CLIENTE', cuenta.ap_paterno AS 'paterno', cuenta.ap_materno AS 'materno',
 cuenta.nombre_usuario, SUM(productos.costo*detalle_ovproductos.cantidad) AS 'SUBTOTAL',
 SUM((productos.costo*detalle_ovproductos.cantidad)*1.16) AS 'TOTAL',
 SUM((productos.costo*detalle_ovproductos.cantidad)*0.16) AS 'IVA',
 orden_ventas_producto.ovp_fecha AS 'FECHA',orden_ventas_producto.id_ovproducto,orden_ventas_producto.Status FROM cuenta 
 inner JOIN orden_ventas_producto on orden_ventas_producto.Usuario_ovp = cuenta.nombre_usuario
 INNER JOIN detalle_ovproductos on detalle_ovproductos.id_DetalleProductos = orden_ventas_producto.id_ovproducto
 INNER JOIN productos on productos.id_producto = detalle_ovproductos.producto
 INNER JOIN cat_productos on cat_productos.id_catproducto = detalle_ovproductos.ov_productos GROUP by orden_ventas_producto.id_ovproducto)
  AS CONI where CONI.Status='Pendiente'
 AND CONI.FECHA='$fecha'";
 $tabla=$consulta->seleccionar($cadena);
echo $fecha;
 echo"<table style='text-align:center' class='table table-hover'>
 <thead class='table-secondary'>
 <tr>
 <th>FOLIO</th>
 <th>CLIENTE</th>
 <th>SUBTOTAL</th>
 <th>IVA</th>
 <th>MONTO CON IVA</th>
 <th></th>
 <th></th>
 </tr>
 </thead><tbody>";
 foreach($tabla as $registro)
 {
     echo "<tr>";
     echo "<td> $registro->FOLIO</td>";
     echo "<td> $registro->Cliente</td>";
     echo "<td>$ $registro->SUBTOTAL</td>";
     echo "<td>$ $registro->IVA</td>";
     echo "<td>$ $registro->Monto_con_IVA</td>";
     ?>
     <td><a href="scripts/finalizarpedido.php?id=<?php echo $registro->FOLIO?>" class="btn btn-secondary">Finalizar</a></td>
     <?php
          ?>
          <td><a href="scripts/cancelarpedido.php?id=<?php echo $registro->FOLIO?>" class="btn btn-danger">Cancelar</a></td>
          <?php
     echo"</tr>";
 }

 echo "</tbody></table>";

?>

    </div>
</body>
</html>