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

        use barber\Query\ejecuta;

        require("../../vendor/autoload.php");
        $id = $_GET['id'];
        $insert = new ejecuta();
        extract($_POST);
        $cadena = "DELETE FROM quejas WHERE id_quejas=$id";


        $insert->ejecutar($cadena);
        echo "<div class='alert alert-danger'>Queja Eliminada</div>";

        header("refresh:2; ../Sugerencias.php");

        ?>

    </div>

</body>

</html>