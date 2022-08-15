<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MiProyecto/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php
        use barber\query\Login;
        require("../../vendor/autoload.php");

        $user = new Login();
        extract($_POST);

        $user->verificaLogin("$usuario","$pass");
        ?>
    </div>
</body>
</html>