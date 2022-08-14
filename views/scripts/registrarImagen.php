<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <title>Registro</title>
    </head>
    <body>
        <div class="container">
            <?php
                use Barber\query\Ejecuta;
                require("../../vendor/autoload.php");

                $insert = new Ejecuta();
                $imagen='';

                if(isset($_FILES["img"]))
                {
                    $file = $_FILES["img"];
                    $nombre = $file["name"];
                    $tipo = $file["type"];
                    $ruta_provisional = $file["tmp_name"];
                    $size =  $file["size"];
                    $dimensiones = getimagesize($ruta_provisional);
                    $width = $dimensiones[0];
                    $height = $dimensiones[1];
                    $carpeta = "../../ImagenCuenta/";
                }
                if($tipo != 'image/jpg' && $tipo !='image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png')
                {
                    echo"El archivo que estas intenando subir no es una imagen, porfavor intenta con otro archivo";
                }
                else
                {
                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    $imagen = "ImagenCuenta/".$nombre;
                }

                extract($_POST);

                $cadena = "UPDATE CUENTA SET imagen_cuenta = '$imagen' where nombre_usuario = 'Abelardo256'";
                $insert-> ejecutar($cadena);
            ?>
        </div>
    </body>
</html>