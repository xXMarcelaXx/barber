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
    use barber\query\ejecuta;
    require("../../vendor/autoload.php");
    extract($_POST);
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
        $carpeta = "../../imgpro/";
    }
    if($tipo != 'image/jpg' && $tipo !='image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png')
    {
        echo "<div class='alert alert-success'> El archivo que estas intenando subir no es una imagen, porfavor intenta con otro archivo </div>";

        header("refresh:2; ../verPro.php");
    }
    else
    {
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        $imagen = "Imagpro/".$nombre;
        $insert =new ejecuta();

        $cadena="INSERT INTO productos VALUES 
        ('','$nombre_producto','$cat','$descripcion','$precio_venta','$precio_compra','$imagen','$existencia')";
    
        $insert->ejecutar($cadena);
        echo "<div class='alert alert-success'> PRODUCTO REGISTRADO </div>";
        header("refresh:2; ../verPro.php");

    
    }

    ?>

    </div>
    
</body>
</html>