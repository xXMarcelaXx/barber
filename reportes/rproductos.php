<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <title>Reporte productos</title>
</head>
<body>

    <div class="container">
        <h1 class="text-center">REPORTE DE PRODUCTOS</h1><br>
        <?php
        use barber\query\select;
        require("../vendor/autoload.php");
        $query=new select();

        $cadena="SELECT * FROM productos inner JOIN cat_productos 
        on productos.cat_producto=cat_productos.id_catproducto";
        $tabla=$query->seleccionar($cadena);

        echo"<table style='text-align:center' class='table table-hover'>
        <thead class='table-secondary'>
        <tr>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Existencia</th>
        <th>Descripción</th>
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
            echo "<td> $registro->descripcion</td>";
            echo"</tr>";
        }

        echo "</tbody></table>";
        ?>
            
    </div>
</body>
</html>