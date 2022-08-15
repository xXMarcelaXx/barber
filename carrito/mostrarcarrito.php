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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <br>
    <div class="container">
        <h3>Lista de Carrito</h3>
        <?php if (!empty($_SESSION['CARRITO'])) { ?>
            <table class="table ">
                <tbody>
                    <tr>
                        <th width="40%">Descripcion</th>
                        <th width="15%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Precio</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%">---</th>
                    </tr>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['CARRITO'] as $menu => $producto) { ?>

                        <tr>
                            <td width="40%"><?php echo $producto['NOMBRE'] ?></td>
                            <td width="15%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
                            <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO'], 2)  ?></td>
                            <td width="20%" class="text-center">$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2)  ?></td>
                            <td width="5%">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                                    <button class="btn btn-danger" type="submit" name="accion" value="eliminar">Eliminar</button>
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
                                <button class="btn btn-primary  btn-long btn-block" type="submit" name="accion" value="proceder">Proceder </button>
                                <a href="../views/profile2.php#productos" class="btn btn-primary" type="button">Tienda</a>

                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="container">

<div class="d-flex justify-content-center row">
    <?php
    $query3= new Select();
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

    <?php } ?>




</div>
        <?php } else { ?>

            <div class="alter alter-success">
                No hay productos en el carrito
                <br>
                <a href="../views/profile2.php#productos" class="btn btn-primary">regresar</a>
            </div>

        <?php } ?>
    </div>

</body>

</html>