<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <br>
    <div class="container">
        <?php

        use barber\Query\select;

        require "../vendor/autoload.php";
        $query = new select();
        $cadena = "SELECT * FROM cuenta WHERE cuenta.nombre_usuario = 'XxAbelardoxX'";
        $tabla = $query->seleccionar($cadena);
        foreach ($tabla as $reg) {
        }
        ?>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <form action="#" method="POST">
                            <div class="row">
                                <!--Nombre de usuario-->
                                <!--ssss-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                        <input type="text" class="form-control" disabled placeholder="Username" name="nombre_usuario" value="<?php echo $reg->nombre_usuario ?>
                                        ">
                                    </div>
                                </div>
                                <!--contraseña-->
                                <!--Nombre-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" disabled placeholder="Ingresa tu nombre" name="nombre" value="<?php echo $reg->nombre ?>
                                        ">
                                    </div>
                                </div>
                                <!--app-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" disabled placeholder="Apellido Paterno" name="ap_paterno" value="<?php echo $reg->ap_paterno ?>
                                        ">
                                    </div>
                                </div>
                                <!--apm-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" disabled placeholder="Apellido Materno" name="ap_materno" value="<?php echo $reg->ap_materno ?>
                                        ">
                                    </div>
                                </div>
                                <!--direccion-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></i></span>
                                        <input type="text" class="form-control" disabled placeholder="Direccion/Calle" name="direccion" value="<?php echo $reg->direccion ?>
                                        ">
                                    </div>
                                </div>
                                <!--Telefono-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="text" class="form-control" disabled placeholder="Numero de telefono" name="telefono" value="<?php echo $reg->telefono ?>
                                        ">
                                    </div>
                                </div>
                                <!--correo-->
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="form-control" disabled placeholder="Correo Electronico" name="correo" value="<?php echo $reg->correo ?>
                                        ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Button trigger modal -->
                                    <a href="../../views/editarbarbero.php?id=<?php echo $reg->nombre_usuario ?>" class="btn btn-outline-secondary">Modificar Datos</a>

                                </div>
                        </form>
                        <!--sueldo-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>