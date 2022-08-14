<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Ver Productos</title>
</head>
<body>
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
use barber\query\select;
require("../vendor/autoload.php");
$pr = new select();
$pmas="SELECT pmv.nombre_producto, max( pmv.cantidad) as 'cantidad_de_ventas' from
(select count(pv.id_producto) as cantidad, pv.nombre_producto from
(SELECT productos.nombre_producto, productos.id_producto from productos inner join detalle_ovproductos on 
detalle_ovproductos.producto=productos.id_producto
inner join orden_ventas_producto on orden_ventas_producto.id_ovproducto=detalle_ovproductos.ov_productos) as pv
group by id_producto ) as pmv";
$res = $pr->seleccionar($pmas);
foreach ($res as $mas) {
  echo "<h4 class='aling center'>Nombre: ".$mas->nombre_producto."</h4>";
  echo "<h4 class='aling center'>Cantidad de ventas: ".$mas->cantidad_de_ventas."</h4>";
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
              $cadena="SELECT id_catproducto, categoria FROM cat_productos";
              $reg = $quer->seleccionar($cadena);

              echo"<div class='mb-3'>
              <label class='control-label'>
              Categroria:
              </label>
              <select name='cat' class='form-select'>";
              foreach ($reg as $value) 
              {
                echo "<option value='".$value->id_catproducto."'>".$value->categoria."</option>";
              }
              echo"</select>
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
                <div >
            
            <form action="#" method="post">
                 <div class="form-row">
            
                    <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"> Categoria </span>
                    <?php
                    $query = new select();
                    $cad="SELECT id_catproducto, categoria FROM cat_productos";
                    $reg = $query->seleccionar($cad);
      
                    echo"<div >
                    <select name='cat' class='form-select'>";
                    foreach ($reg as $value) 
                    {
                      echo "<option value='".$value->id_catproducto."'>".$value->categoria."</option>";
                    }
                    echo"</select>
                    </div>";
                    ?>          
                   <div class="modal-footer">
              <button type="submit" class="btn btn-secondary">Buscar</button>
            </div>                                
                    </div>
                   

                 </div>
               </form>
                </div>
                </div><br>
                <div class="row">
                  
        <?php
 if($_POST)
 {
 extract($_POST);
 $consulta= new select();

 $cadena="SELECT * FROM productos inner JOIN cat_productos on productos.cat_producto=cat_productos.id_catproducto
 where cat_productos.id_catproducto=$cat";
 $tabla=$consulta->seleccionar($cadena);

 echo"<table style='text-align:center' class='table table-hover'>
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

 foreach($tabla as $registro)
 {
     echo "<tr>";
     echo "<td> $registro->nombre_producto</td>";
     echo "<td> $registro->categoria</td>";
     echo "<td> $registro->precio_compra</td>";
     echo "<td> $registro->costo</td>";
     echo "<td> $registro->existencia</td>";
     echo "<td> $registro->descripcion</td>";
     ?>
     <td><a href="editarPro.php?id=<?php echo $registro->id_producto?>" class="btn btn-secondary">Editar</a></td>
    <?php
         ?>
         <td><a href="ingresaexistencia.php?id=<?php echo $registro->id_producto?>" class="btn btn-secondary">Agregar</a></td>
        <?php
     echo"</tr>";
 }

 echo "</tbody></table>";
}
?>
                </div>        

    
    </div>
    
</body>
</html>