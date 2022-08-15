<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css">
    <title>registro</title>
</head>
<body>
    <div class="container">
        <?php
        use barber\query\ejecutal;
        require("../../vendor/autoload.php");

        $insert=new ejecutal();
       
        extract($_POST);
        if ($contraseña1==$contraseña)
         {
             $insert->verificareg("$nombre_usuario");
              $hash=password_hash($contraseña,PASSWORD_DEFAULT);
              $tiempo = date('Y-m-d');
              $cadena="INSERT INTO cuenta VALUES('$nombre_usuario','$hash','$nombre','$ap_paterno','$ap_materno','$direccion','$telefono','$correo','','Administrador','$tiempo')";
              $insert->ejecutar($cadena);  
         }     
         else
          {
            echo"<p><font color='red'>las contraseñas no coinciden</font></p>";
            header("refresh:3 ; ../registro.php");
          }    
        ?>
    </div>
</body>
</html>