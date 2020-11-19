<?php
namespace Alura\Pdo\Infraestrutura\Persistencia;
use PDO;

class ConnectionCreate {
    public static function createConnetion(string $dataBase,string $nameAchive): PDO {
        $dataBasePath = __DIR__ . ('/../../../' . $nameAchive);
        $connection =  new PDO($dataBase . $dataBasePath);

        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        return $connection;
    }
}