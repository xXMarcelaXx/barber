<?php
namespace barber\Query;
use PDO;
use PDOException;
use barber\Data\Database;

class ejecuta
{
    public function ejecutar($query)
    {
        try
        {
            $cc= new Database("barberia","admin","1234");
            $objetoPDO=$cc->getPDO();
            $resultado=$objetoPDO->query($query);
            $cc->desconectarDB();
        }
        catch(PDOException $e)
        {
            echo $e->getMassage();
        }
    }
}