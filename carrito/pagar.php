<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    use barber\Query\ejecuta;

    require ("../vendor/autoload.php");
    include 'carrito.php';
    $SID=session_id();
    if($_POST)
    {
        
        $total=0;
        foreach($_SESSION['CARRITO']as $menu=>$producto)
        {
            $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
           
        }
        $usuario=new ejecuta();
        $resultado=new ejecuta();
      $cadena="INSERT INTO orden_ventas_producto VALUES ('','XxMarcelaxX',now(),'Pendiente')";
       $usuario->ejecutar($cadena);


       $consulta="SELECT max(id_ovproducto) as id FROM orden_ventas_producto";
        $resultado=$usuario->ejecutar($consulta);
        foreach($resultado as $row)
        {
            $id=$row->id;
        }
        foreach($_SESSION['CARRITO']as $menu=>$producto)
            {
            $idpro=$producto['ID'];
            $canti=$producto['CANTIDAD'];
          $cadena2="INSERT INTO detalle_ovproductos VALUES('','$idpro', '$canti','$id')";
            $usuario->ejecutar($cadena2);

            $existencia="SELECT productos.existencia from productos where productos.id_producto=$idpro";
            $existe=$usuario->ejecutar($existencia);
                foreach($existe as $row)
                {
                $totalexistencia=$row->existencia;
                    
                }
                   echo "$totalexistencia este es la exitencia </br>";
                   $existenactual=$totalexistencia-$canti;
                   echo "$existenactual";

                $update=" UPDATE  productos SET existencia=$existenactual  WHERE id_producto = $idpro";
                $usuario->ejecutar($update);

        }
       $orden="SELECT productos.nombre_producto , orden_ventas_producto.ovp_fecha, detalle_ovproductos.cantidad,
        productos.costo, (detalle_ovproductos.cantidad*productos.costo) Total
        FROM productos INNER JOIN detalle_ovproductos ON productos.id_producto=detalle_ovproductos.producto
        INNER JOIN orden_ventas_producto ON detalle_ovproductos.ov_productos=orden_ventas_producto.id_ovproducto
        INNER JOIN cuenta ON orden_ventas_producto.Usuario_ovp=cuenta.nombre_usuario  
        AND orden_ventas_producto.id_ovproducto=$id";
        $usuario->ejecutar($orden);
        
        session_destroy();
        header('location: ../views/profile2.php#productos');     
            
    }
   
   
    ?>
</body>
</html>