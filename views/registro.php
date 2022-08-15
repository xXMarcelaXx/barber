<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sesion1.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

   
    <title>login</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center pt-5 mt-5 m-1">
        <div class="col-12 col-md-6 col-lg-4 formulario">
        <form action="../views/scripts/guardacliente.php"method="post">
        <div class="form-group text-center pt-3">
                <h1>Bienvenido</h1>  
               </div>
                            <div class="row">
                                <!--Nombre usuario-->
                                <div class="col-md-6 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                        <input type="text" class="form-control"required placeholder=" usuario" name="nombre_usuario">
                                    </div>
                                </div>
                                 <!--contraseña-->
                                 <div class="col-md-6 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                        <input type="password" class="form-control" required placeholder=" contraseña" name="contraseña">
                                    </div>
                                </div>
                                 <!--contraseña-->
                                 <div class="col-md-12 col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                                        <input type="password" class="form-control" required placeholder="reescribe contraseña" name="contraseña1">
                                    </div>
                                </div>
                                <!--Nombre-->
                                <div class="col-md-12 col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" required placeholder="Ingresa tu nombre" name="nombre">
                                    </div>
                                </div>
                                <!--app-->
                                <div class="col-md-6 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></i></span>
                                        <input type="text" class="form-control" required placeholder="Apellido Paterno" name="ap_paterno">
                                    </div>
                                </div>
                                <!--apm-->
                                <div class="col-md-6 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                        <input type="text" class="form-control" required placeholder="Apellido Materno" name="ap_materno">
                                    </div>
                                </div>
                                <!--direccion-->
                                <div class="col-md-6 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
                                        <input type="text" class="form-control" required placeholder="Direccion/Calle" name="direccion">
                                    </div>
                                </div>
                                <!--Telefono-->
                                <div class="col-md-6 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="text" class="form-control"required placeholder="Numero de telefono" name="telefono">
                                    </div>
                                </div>
                                <!--correo-->
                                <div class="col-md-12 col-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                        <input type="mail" class="form-control" required placeholder="Correo Electronico" name="correo">
                                    </div>
                                </div>
               <div class="form-group mx-sm-4 pb-2 col-md-6 col-12">
                <input type="submit" class="btn btn-dark" value="guardar">
               </div>
               <br>
               <div class="form-group mx-sm-1 text-right">
                <span ><font color="white">¿Si tienes cuenta?</font><a class="olvide" href="../views/iniciosesion.php">Inicia sesion</a></span>
                <br>
                <a class="icon-login"style="color:white;" href="../../integradora/views/iniciosesion.php">regresar</a>
               </div>
          </form>
        </div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
</body>
</html>