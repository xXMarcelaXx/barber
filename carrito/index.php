<?php
include 'carrito.php';
use barber\Query\Select;
require("../vendor/autoload.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <title>Tienda</title>
</head>

<body>
    <div class="container">
        <a href="mostrarcarrito.php">SHjsh</a>
        <h2>Tienda</h2>
        <div class="row">
            <div class="col-md-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-cart-fill"></i>(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']); ?>)</a>
                </button>
                <br>
                <br>
                <!-- Modal -->
                <div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Mi carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
                                <div class="container">
                                    
                                    <?php if (!empty($_SESSION['CARRITO'])) { ?>
                                        <table class="table ">
                                            <tbody>
                                                <tr>
                                                    <th width="30%">Poducto</th>
                                                    <th width="10%" class="text-center">Cantidad</th>
                                                    <th width="25%" class="text-center">Precio</th>
                                                    <th width="10%" class="text-center">Total</th>
                                                    <th width="10%"></th>
                                                </tr>
                                                <?php $total = 0; ?>
                                                <?php foreach ($_SESSION['CARRITO'] as $menu=> $producto) { ?>

                                                    <tr>
                                                        <td width="30%"><?php echo $producto['NOMBRE'] ?></td>
                                                        <td width="10%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                                                        <td width="25%" class="text-center">$<?php echo number_format($producto['PRECIO'], 2)  ?></td>
                                                        <td width="10%" class="text-center">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2)  ?></td>
                                                        <td width="10%">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                                                                <button class="btn btn-danger" type="submit" name="accion" value="eliminar" >Eliminar</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']); ?>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="3" align="rigth">
                                                        <h3>Total</h3>
                                                    </td>
                                                    <td align="rigth">
                                                        <h3>$<?php echo number_format($total, 2) ?></h3>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <form action="pagar.php" method="POST">
                                                            <input type="hidden" name="id" value="<?php echo $producto['CANTIDAD']; ?>">
                                                            <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                                                            <button class="btn btn-primary  btn-long btn-block" type="submit" name="accion" value="proceder">Confirmar Pedido</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>

                                        <div class="alter alter-success">
                                            No hay productos en el carrito
                                            <br>
                                        </div>

                                    <?php } ?>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="d-flex justify-content-center row">
            <?php
            $query3 = new Select();
            $cadena3 = "SELECT * from productos";
            $producto = $query3->seleccionar($cadena3);

            foreach ($producto as $pro) {
                $producto_nom = $pro->nombre_producto;
                $descripcion = $pro->descripcion;
                $precio = $pro->costo;
                #$img=$pro->imagene;
                $id = $pro->id_producto;
                $existencia = $pro->existencia;

            ?>

                <div class="container">
                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1"><img data-toggle="popover" class="img-fluid img-responsive rounded product-image" src="<?php echo $img; ?>">
                        </div>
                        <div class="col-md-6 mt-1">
                            <h5><?php echo $producto_nom; ?></h5>
                            <div class="d-flex flex-row ratings mt-2 text-warning">
                                <p class="text-justify"><?php echo $descripcion; ?><br><br></p>

                            </div>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">$<?php echo $precio; ?></h4>
                            </div>
                            <h6 class="text-success">Recoger en tienda!</h6>
                            <div class="d-flex flex-column mt-4">
                                <form action="carrito.php" method="POST">
                                    <input type="hidden" name="existencia" id="existencia" value=" <?php echo $existencia; ?>">
                                    <input type="hidden" name="id" id="id" value=" <?php echo $id; ?>">
                                    <input type="hidden" name="nombre" id="nombre" value=" <?php echo $producto_nom; ?>">
                                    <input type="hidden" name="precio" id="precio" value=" <?php echo $precio; ?>">
                                    <input type="number" name="cantidad" id="cantidad" value="" min="0" max='<?php echo $existencia; ?>'><br>
                                    <button class="btn btn-outline-primary btn-sm mt-1" name="accion" value="agregar" type="submit">  Añadir  </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>




        </div>

</body>

</html>