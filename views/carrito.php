<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../PHP/css/bootstrap.min.css">

    <title>CARRITO</title>
</head>
<body>
    
        
 <div class="container">


        <div class="section-title">
        <h2>Tienda</h2>
        <p>Contamos con variedad de productos</p>
    </div>

    <?php
    use barber\Query\Select;
      require("../vendor/autoload.php");

      $query3 =new Select();
      $cadena3= "SELECT productos.id_producto id,productos.nombre_producto , productos.descripción  , productos.costo from productos";
      $producto=$query3->seleccionar($cadena3);
      
      foreach ( $producto as $pro)
      {
        $producto_nom=$pro->nombre_producto;
        $descripcion=$pro->descripción;
        $costo=$pro->costo;
        echo "      <div class='d-flex justify-content-center row'>
        <div class='col-md-10'>
            <div class='row p-2 bg-white border rounded'>
                <div class='col-md-3 mt-1'><img class='img-fluid img-responsive rounded product-image'
                 src='https://i5.walmartimages.com/asr/1e60d9e2-3af6-49c9-94b8-e06a41f40d7d.934132c21c9cf35f932b6c3b1ea4574f.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF'>
                 </div>
                <div class='col-md-6 mt-1'>
                    <h5 >".$producto_nom ."</h5>
                    <div class='d-flex flex-row ratings mt-2 text-warning'>
                      
                    <p class='text-justify'>".$descripcion."<br><br></p>
                </div>
                </div>
                <div class='align-items-center align-content-center col-md-3 border-left mt-1'>
                    <div class='d-flex flex-row align-items-center'>
                        <h4 class='mr-1'>$".$costo."
                    </div>
                    <h6 class='text-success'>Recoger en tienda!</h6>
                    <div class='d-flex flex-column mt-4'><a class='btn btn-outline-primary btn-sm mt-2' type='button'  href='#'>Añadir al Carrito</a></div>
                    <div class='d-flex flex-column mt-4'><a class='btn btn-outline-danger btn-sm mt-2' type='submit'  href='detalles.php'>Detalles</a></div>

                </div>
                </div>
                </div> </div>";
         
      }
     
    
    ?>
     </div>
</body>
</html>