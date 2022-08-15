<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sesion.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

   
    <title>login</title>
</head>
<body>
<div class="conteiner">
    <div class="row justify-content-center pt-5 mt-5 m-1">
        <div class="col-12 col-md-6 col-lg-4 formulario">
          <form action="../views/scripts/guardaU.php"method="post">
              <div class="form-group text-center pt-3">
                <h1> Iniciar Sesion</h1>  
               </div>
               <div class="input-group mx-sm-1 pt-3 pb-3">
               <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control"required placeholder="ingrese su usuario" name="nombre_usuario">
               </div>
               <div class="input-group mx-sm-1 pb-3">
               <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input type="password" class="form-control"required placeholder="ingrese su contraseña" name="contraseña">
               </div>
               <div class="form-group mx-sm-4 pb-3">
                <input type="submit" class="btn btn-block btn-outline-secondary " value="Ingresar">
               </div>
               <div class="form-group mx-sm-1 text-right">
                <span >¿No tienes cuenta?<a class="olvide" href="../views/registro.php">registrate</a></span>
                <br>
                <a class="icon-login"style="color:white;" href="../index.php">regresar</a>
                
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