<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<br>
    <div class="container">
        <?php

        use barber\Query\Select;
        $id = $_GET['id'];
        require "../vendor/autoload.php";
        $query = new select();
        $cadena = "SELECT * FROM cuenta WHERE cuenta.nombre_usuario = '$id'";
        $tabla = $query->seleccionar($cadena);
        foreach ($tabla as $reg) {
        }
        ?>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-4 offset-sm-">
            <div class="container">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <form action="guardarcliente.php" method="POST">
                            <div class="row">
                                <!--Nombre de usuario-->
                                <!--ssss-->
                                <div class="col-md-12" hidden>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle" hidden></i></span>
                                        <input type="text" class="form-control" placeholder="Username" name="nombre_usuario" value="<?php echo $reg->nombre_usuario ?> 
                                    " hidden>
                                    </div>
                                </div>
                                <!--contraseña-->
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="Ingresa tu nombre" name="nombre" value="<?php echo $reg->nombre ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12 form-row">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Nueva contraseña" name="contraseña" value="<?php echo $reg->contraseña ?>" id="password" required>
                                    </div>
                                </div>
                                <!--Nombre-->
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                        <input type="password" class="form-control" placeholder="Verifica Contraseña" name="Ncontraseña" id="Npassword" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="mostrarContrasena2()"><i class="bi bi-eye-fill"></i></button>
                                    </div>
                                </div>
                                <script>
                                    function mostrarContrasena2() {
                                        var tipo = document.getElementById("Npassword");
                                        if (tipo.type == "password") {
                                            tipo.type = "text";
                                        } else {
                                            tipo.type = "password";
                                        }
                                    }
                                </script>


                                <!--app-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="Apellido Paterno" name="ap_paterno" value="<?php echo $reg->ap_paterno ?>
                                    " required>
                                    </div>
                                </div>
                                <!--apm-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="Apellido Materno" name="ap_materno" value="<?php echo $reg->ap_materno ?>
                                    " required>
                                    </div>
                                </div>
                                <!--direccion-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></i></span>
                                        <input type="text" class="form-control" placeholder="Direccion/Calle" name="direccion" value="<?php echo $reg->direccion ?>
                                    ">
                                    </div>
                                </div>
                                <!--Telefono-->
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="text" class="form-control" placeholder="Numero de telefono" name="telefono" value="<?php echo $reg->telefono ?>
                                    " required>
                                    </div>
                                </div>
                                <!--correo-->
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="email" class="form-control" placeholder="Correo Electronico" name="correo" value="<?php echo $reg->correo ?>" required>
                                    </div>
                                </div>
                                <!--imagen-->
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Foto de Perfil</span>
                                        <input type="file" class="form-control" name="imagen">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </form>
                    </div>

                    <!--sueldo-->
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>