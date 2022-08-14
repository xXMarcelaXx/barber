<?php
use barber\query\select;
require("../vendor/autoload.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container"><br><br>
<?php

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
            as CONI
            where CONI.id_ovproducto=$folio and CONI.Status='Finalizada' ";
            $tabla=$con->seleccionar($cadena);
            if($tabla==null){
                echo "<div class='alert alert-danger'>FOLIO NO ENCONTRADO</div>";

                header("refresh:2; ../views/pedidos.php");
            
            }
            else{
                
            echo"<table style='text-align:center' class='table table-hover'>
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
           
            foreach($tabla as $registro)
            {
                echo "<tr>";
                echo "<td> $registro->FOLIO</td>";
                echo "<td> $registro->FECHA</td>";
                echo "<td> $registro->Cliente</td>";
                echo "<td>$ $registro->SUBTOTAL</td>";
                echo "<td>$ $registro->IVA</td>";
                echo "<td>$ $registro->Monto_con_IVA</td>";
                echo"</tr>";
            }
           
            echo "</tbody></table>";
        
            }
        
    


?>

    </div>
</body>
</html>