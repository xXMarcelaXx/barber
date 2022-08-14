<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Ver Categorias</title>
</head>
<body>
    <div class="container">
        <h1>Categoria de Productos</h1><br>

        <div class="row">
          <div class="col-4 col-md-3">
          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Añadir Categoria
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Categoria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="scripts/guardaCat.php" method="post">
           <div class="form-row">
           <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="bi bi-wrench"></i></span>
              <input type="text" class="form-control" name="categoria" placeholder="Nombre" required>
              </div>
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

        </div>

        <div class="row">
          <div class="col-10 col-md-4">
          <br>
    <?php
        use barber\query\select;
        require("../vendor/autoload.php");

        $query=new select();

        $cadena="SELECT * FROM cat_productos";
        $tabla=$query->seleccionar($cadena);

        echo"<table class='table table-hover'>
        <thead class='table-secondary'>
        <tr>
        <th>Nombre</th>
        <th></th>
        </tr>
        </thead><tbody>";

        foreach($tabla as $registro)
        {
            echo "<tr>";
            echo "<td> $registro->categoria</td>";
            ?>
            <td ><a href="editarCat.php?id=<?php echo $registro->id_catproducto?>" class="btn btn-secondary">Editar</a></td>
           <?php
            echo"</tr>";
        }

        echo "</tbody></table>";
        ?>
</div>        
          
          <div class="col-4"></div>

    </div>
    
    </div>
</body>
</html>