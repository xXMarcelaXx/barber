<?php
use barber\query\select;
require("../vendor/autoload.php");
      
$query = new select();
$id=$_GET['id'];
$sql="SELECT * FROM productos WHERE id_producto='$id'";
$tabla=$query->seleccionar($sql);
foreach($tabla as $registro)
{}
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
    <title>Document</title>
</head>
<body>
    <div class="container"><br><br>
        <div class="row">
            <h1 class="text-center">EDITAR PRODUCTOS</h1>
            <div class="col-4"></div>
            <div class="col-4">
                
      <form action="scripts/actualizarPro.php" method="post">
           <div class="form-row ">
           <div class="form-group">
              <div class="input-group mb-3">
              <input type="hidden" name="id_producto" value="<?php echo $registro->id_producto ?>">
              </div>
             <div class="form-group">
              <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-wrench"></i></span>
              <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre" required value="<?php echo $registro->nombre_producto ?>">
              </div>

              <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
              <input type="number" class="form-control" name="precio_compra" placeholder="Precio_compra" required value="<?php echo $registro->precio_compra?>">
              </div>

              <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
              <input type="number" class="form-control" name="precio_venta" placeholder="Precio venta"required value="<?php echo $registro->costo?>">
              </div>

              <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-list-check"></i></span>
              <input type="number" class="form-control" name="existencia" placeholder="Existencia"required value="<?php echo $registro->existencia?>">
              </div>

              <div class="input-group">
              <span class="input-group-text"><i class="bi bi-list-check"></i></span>
              <input type="text" class="form-control" name="descripcion" required value="<?php echo $registro->descripcion?>" >
              </div><br>

              <?php
              $quer = new select();
              $cadena="SELECT id_catproducto, categoria FROM cat_productos";
              $reg = $quer->seleccionar($cadena);
              $cat=$registro->cat_producto;

              echo"<div class='mb-3'>
              <label class='control-label'>
              Categroria:
              </label>
              <select name='cat' class='form-select'>";
              foreach ($reg as $value) 
              {
                if ( $cat == $value->id_catproducto )
                {
                  echo "<option value='" . $value->id_catproducto . "' selected='selected'>" . $value->categoria . "</option>";
              }
              else 
              {
                echo "<option value='".$value->id_catproducto."'>".$value->categoria."</option>";
              }
              }
              echo"</select>
              </div>";
              ?>
             </div><br>
             <div class="modal-footer">
        <button type="submit" class="btn btn-secondary">Guardar</button>
      </div>
           </div>
         </form>
            </div>
        </div>
    </div>
    
</body>
</html>
