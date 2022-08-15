<?php 
namespace barber\query;

use PDO;
use PDOException;
use barber\Data\Database;

class login
{
    public function logeate($nombre_usuario,$contraseña)
    {
        try
        {
            $pase=0;
            $cc= new Database("barberia","root","1234");
             $objetopdo=$cc->getPDO();
             $admin='Administrador';
             $query="SELECT*FROM cuenta WHERE nombre_usuario='$nombre_usuario' and tipo_cuenta='$admin'";
             $consulta=$objetopdo->query($query);
            while($renglon=$consulta->fetch(PDO::FETCH_BOTH))
            {
                if(password_verify($contraseña,$renglon['contraseña']))
                {
                    $pase=1;
                }
            }
            if($pase>0)
            {
                session_start();
                $_SESSION["usuario"]=$nombre_usuario;
                 $_SESSION["tipo_cuenta"]='Administrador';
                echo "<div class='alet alet-succes'>";
                echo "<h2 align='center'>BIENVENIDO ".$_SESSION["usuario"]."</h2>";
               
                echo"</div";
                header("location:../../views/vistaadmin.php");
              
            }
            else
            {
                echo "<div class='alert alert-succes'>";
                echo "<p align='center'>nombre de usuario o contraseña incorrectos.</p>";
                echo"</div";
              
            }

            $cc->desconectarDB();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function logeate1($nombre_usuario,$contraseña)
    {
        try
        {
            $pase=0;
            $cc= new Database("barberia","root","1234");
             $objetopdo=$cc->getPDO();
             $usuario='Usuario';
             $query="SELECT*FROM cuenta WHERE nombre_usuario='$nombre_usuario' and tipo_cuenta='$usuario'";
             $consulta=$objetopdo->query($query);
            while($renglon=$consulta->fetch(PDO::FETCH_BOTH))
            {
                if(password_verify($contraseña,$renglon['contraseña']))
                {
                    $pase=1;
                }
            }
            if($pase>0)
            {
                session_start();
                $_SESSION["usuario"]=$nombre_usuario;
                $_SESSION["tipo_cuenta"]='Usuario';
                echo "<div class='alet alet-succes'>";
                echo "<h2 align='center'>BIENVENIDO ".$_SESSION["usuario"]."</h2>";
                
                echo"</div";
                header("location:../../views/profile2.php");
              
            }
            else
            {
                echo "<div class='alert alert-succes'>";
                echo "<p align='center'>nombre de usuario o contraseña incorrectos.</p>";
                echo"</div";
              
            }

            $cc->desconectarDB();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}