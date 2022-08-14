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
    <title>Productos por utilidad</title>
</head>
<body>

    <div class="container">
    <h1 class="text-center">PRODUCTOS POR UTILIDAD</h1><br>

    <div class="row">
      <div class="col-2 col-md-4"></div>
      <div class="col-8 col-md-4">
        <label for="">Ingresa un valor para utilidad:</label>
        
    <form action="#" method="post">
           <div class="form-row">
           <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-wrench"></i></span>
              <input type="number" class="form-control" name="utilidad" min="0" placeholder="Ingresa una cantidad"required>
              </div>
              <div class="modal-footer">
        <button type="submit" class="btn btn-secondary">Guardar</button>
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

        $cadena="SELECT pcu.nombre_producto, pcu.utilidad from
        (select productos.nombre_producto, sum(productos.costo-productos.precio_compra) as utilidad,
        productos.precio_compra,productos.costo from productos 
        group by productos.id_producto) as pcu where pcu.utilidad<$utilidad";
        $tabla=$q->seleccionar($cadena);
        echo"<h3 class='text-center'>Productos con utilidad menor a: ".$utilidad." </h3><br>
        <table style='text-align:center' class='table table-hover'>
        <thead class='table-secondary'>
        <tr>
        <th>Nombre</th>
        <th>Utilidad</th>
        </tr>
        </thead><tbody>";

        foreach($tabla as $registro)
        {
            echo "<tr>";
            echo "<td> $registro->nombre_producto</td>";
            echo "<td>$ $registro->utilidad</td>";
            echo"</tr>";
        }

        echo "</tbody></table>";
        }
        ?>

        </div>
            
    </div>
</body>
</html>