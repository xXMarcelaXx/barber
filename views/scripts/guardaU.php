<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php 
        use barber\query\login;
        require("../../vendor/autoload.php");
        $user=new login();
        extract($_POST);

        $user->logeate("$nombre_usuario","$contraseña");
        $user->logeate1("$nombre_usuario","$contraseña");
        ?>
    </div>
</body>
</html>