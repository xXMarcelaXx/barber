<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../../PHP/css/bootstrap.min.css">
    <title>Clientes</title>
</head>
<body>
<div id="perfil"class="container ">
             <section >
             <h2 >Perfil</h2>
             <br>
<?php
         use barber\Query\Select;
         require("../vendor/autoload.php");

        $query =new Select();
        
         $cadena="SELECT cuenta.nombre, concat(cuenta.nombre,' ',cuenta.ap_paterno,' ',cuenta.ap_materno)as completo,
         cuenta.direccion,cuenta.telefono,cuenta.correo FROM cuenta INNER JOIN usuario
         on cuenta.nombre_usuario=usuario.cuenta_U where usuario.id_Usuario=2 and cuenta.tipo_cuenta='Usuario'";

         $tabla=$query->seleccionar($cadena);
        
        foreach($tabla as $row)
         {
            $nombre=$row->nombre;
            $completo=$row->completo;  
            $direccion=$row->direccion;
            $telefono=$row->telefono;
            $email=$row->correo;
         }
         echo " 
               <div class='row'>
                 <div class='col-lg-4'>
                   <div class='card mb-4'>
                     <div class='card-body text-center'>
                       <img src='../../Bootstrap/IMG/R.jfif' alt='avatar'
                         class='rounded-circle img-fluid' style='width: 90px; height: 111px;'>
                       <h5 class='my-3'>".$nombre."</h5>
                       <p class='text-muted mb-1'>Cliente</p>
                     </div>
                   </div>
                 </div>
                 <div class='col-lg-8'>
                   <div class='card mb-4'>
                     <div class='card-body'>
                     <div class='row'>
                     <div class='col-sm-3'>
                       <p class='mb-0'>Email</p>
                     </div>
                     <div class='col-sm-9'>
                       <p class='text-muted mb-0'>". $completo."</p>
                     </div>
                   </div>
                       <hr>
                       <div class='row'>
                         <div class='col-sm-3'>
                           <p class='mb-0'>Email</p>
                         </div>
                         <div class='col-sm-9'>
                           <p class='text-muted mb-0'>". $email."</p>
                         </div>
                       </div>
                       <hr>
                       <div class='row'>
                         <div class='col-sm-3'>
                           <p class='mb-0'>Telefono</p>
                         </div>
                         <div class='col-sm-9'>
                           <p class='text-muted mb-0'>". $telefono."</p>
                         </div>
                       </div>
                       <hr>
                      
                       <div class='row'>
                       <div class='col-sm-3'>
                         <p class='mb-0'>Email</p>
                       </div>
                       <div class='col-sm-9'>
                         <p class='text-muted mb-0'>". $direccion."</p>
                       </div>
                     </div>
                     </div>
                   </div>
                
                 </div>
              
         ";
  
        ?>
      
 <section >
        </div>

        <div class="container" id="historial">
            <section>
              <h3>Historial</h3>

            <?php
          require("../vendor/autoload.php");

          $query2 =new Select();

          $cadena2= "SELECT productos.nombre_producto , orden_ventas_producto.ovp_fecha,
          detalle_ovproductos.cantidad,productos.costo, (detalle_ovproductos.cantidad*productos.costo) Total,orden_ventas_producto.forma_pago
          from cuenta inner join usuario on cuenta.nombre_usuario=usuario.cuenta_U inner join orden_ventas_producto
          on orden_ventas_producto.Usuario_ovp=usuario.id_Usuario inner join detalle_ovproductos on 
          detalle_ovproductos.id_DetalleProductos=orden_ventas_producto.id_ovproducto inner join productos
           on productos.id_producto=detalle_ovproductos.producto;";
          $historial=$query2->seleccionar($cadena2);


          foreach ($historial as $his)
          {
            $producto_n=$his->nombre_producto;
            

          }
          ?>

            </section>
          </div>






           <!--Tienda de productos -->
        <section id="productos" class="productos">
        <div class="container">
            <div class="section-title">
                <h2>Tienda</h2>
                <p>Contamos con variedad de productos</p>
                <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red; cursor:pointer;"><i class="bi bi-cart"></i></a>
          <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
          <label label-for="Password" class="control-label">Contraseña:</label>
                                    <input name="password" class="form-control" type="password" />
        </li>
            </div>

            <?php
              require("../vendor/autoload.php");

              $query3 =new Select();
              $cadena3= "SELECT productos.id_producto id,productos.nombre_producto , productos.descripción  , productos.costo from productos";
              $producto=$query3->seleccionar($cadena3);
              
              foreach ( $producto as $pro)
              {
                $producto_nom=$pro->nombre_producto;
                $descripcion=$pro->descripción;
                $costo=$pro->costo;
                echo "      <div class='d-flex justify-content-center row' >
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
                                <h4 class='mr-1'>$".$costo."</h4>
                            </div>
                            <h6 class='text-success'>Recoger en tienda!</h6>
                            <div class='d-flex flex-column mt-4'><a class='btn btn-outline-primary btn-sm mt-2' type='submit' name='accion' value='agregar'>Añadir al Carrito</a></div>
                            <div class='d-flex flex-column mt-4'><a class='btn btn-outline-danger btn-sm mt-2' type='button'  href='detalles.php'>Detalles</a></div>

                        </div>
                        </div>
                        </div> </div>";
                 
              }
             
            ?>
            
        </div>
            </section>
  <!--Fien de la seccion d¿tienda de productos -->
 <section>
  <?php
  

  require "../vendor/autoload.php";
if (isset($_GET['enviar'])) {
  $busqueda = $_GET['busqueda'];

  $query = new select();
  $cadena = "SELECT * FROM cuenta WHERE nombre LIKE '%$busqueda%'";
  $tabla = $query->seleccionar($cadena);


  echo "<table class='table-hover table'>
<thead class='table-secondary'>
<tr>
<th>Nombre</th>
<th>Apellidos</th>
<th>Direccion</th>
<th>Telefono</th>
<th>Correo</th>
</tr>
</thead>
<tbody>";
  foreach ($tabla as $registro) {
      echo "<tr>";
      echo "<td> $registro->nombre</td>";
      echo "<td> $registro->ap_paterno $registro->ap_materno</td>";
      echo "<td> $registro->direccion</td>";
      echo "<td> $registro->telefono</td>";
      echo "<td> $registro->correo</td>";
      echo "</tr>";
  }
}
echo "</tbody>";
echo "</table>";
?>
  
 </section>
        

    
</body>
</html>