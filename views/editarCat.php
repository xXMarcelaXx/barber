<?php
use barber\query\select;
require("../vendor/autoload.php");
      
$query = new select();
$id=$_GET['id'];
$sql="SELECT * FROM cat_productos WHERE id_catproducto='$id'";
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
            <h1 class="text-center">EDITAR CATEGORIA</h1>
            <div class="col-4"></div>
            <div class="col-4">
                
      <form action="scripts/actualizarCat.php" method="post">
      <div class="form-row">
      <div class="input-group mb-3">
              <input type="hidden" name="id_catproducto" value="<?php echo $registro->id_catproducto ?>">
              </div>
           <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-wrench"></i></span>
              <input type="text" class="form-control" name="categoria" placeholder="Nombre" value="<?php echo $registro->categoria ?>" required >
              </div>
              <div class="modal-footer">
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