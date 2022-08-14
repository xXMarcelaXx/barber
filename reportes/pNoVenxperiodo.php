<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <title>Ver Clientes</title>
</head>
<body>
    <div class="container">
        <h1 aling="center">Clientes</h1>
        <?php
        use barber\query\select;
        require("../vendor/autoload.php");

        $query=new select();

        extract($_POST);

        $cadena="SELECT productos.nombre_producto,cat_productos.categoria,productos.precio_compra, productos.costo,productos.existencia from productos left join
        (SELECT * from productos inner join detalle_ovproductos on 
        detalle_ovproductos.producto=productos.id_producto
        inner join orden_ventas_producto on orden_ventas_producto.id_ovproducto=detalle_ovproductos.ov_productos
        where orden_ventas_producto.ovp_fecha between '$fechai' and '$fechaf') as pv on productos.id_producto=pv.id_producto
        inner join cat_productos on cat_productos.id_catproducto=productos.cat_producto
        where pv.id_producto is null;";
        $tabla=$query->seleccionar($cadena);

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
        ?>

    </div>
    
</body>
</html>