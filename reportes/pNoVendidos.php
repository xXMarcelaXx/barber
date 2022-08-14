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
    <title>Reporte productos no vendidos</title>
</head>
<body>

    <div class="container">
    <h1 class="text-center">PRODUCTOS NO VENDIDOS</h1><br>

    <div class="row">
      <div class="col-2 col-md-4"></div>
      <div class="col-8 col-md-4">
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
        <button type="submit" class="btn btn-secondary">Guardar</button>
      </div>              
              </div>

           </div>
         </form><br>
      </div>
    </div>

        <div class="container">
        <?php
        if ($_POST)
        {
        extract($_POST);

        $q=new select();

        $cadena="SELECT productos.nombre_producto,cat_productos.categoria,productos.precio_compra, productos.costo,productos.existencia from productos left join
        (SELECT * from productos inner join detalle_ovproductos on 
        detalle_ovproductos.producto=productos.id_producto
        inner join orden_ventas_producto on orden_ventas_producto.id_ovproducto=detalle_ovproductos.ov_productos
        where orden_ventas_producto.ovp_fecha between '$fechai' and '$fechaf') as pv on productos.id_producto=pv.id_producto
        inner join cat_productos on cat_productos.id_catproducto=productos.cat_producto
        where pv.id_producto is null;";
        $tabla=$q->seleccionar($cadena);

        echo"<table style='text-align:center' class='table table-hover'>
        <thead class='table-secondary'>
        <tr>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Existencia</th>
        </tr>
        </thead><tbody>";

        foreach($tabla as $registro)
        {
            echo "<tr>";
            echo "<td> $registro->nombre_producto</td>";
            echo "<td> $registro->categoria</td>";
            echo "<td>$ $registro->precio_compra</td>";
            echo "<td>$ $registro->costo</td>";
            echo "<td> $registro->existencia</td>";
            echo"</tr>";
        }

        echo "</tbody></table>";
        }
        ?>

        </div>
            
    </div>
</body>
</html>