<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\PdoStudentRepository;
use Alura\Pdo\Infraestrutura\Persistencia\ConnectionCreate;

require_once 'vendor/autoload.php';

try{
    $connection = ConnectionCreate::createConnetion('sqlite:', 'banco.sqlite');
    $repository = new PdoStudentRepository($connection);
    $connection->beginTransaction();
    $createTableSql = "INSERT INTO phones (area_code, number, student_id) VALUES ('24', '99999999', 1), ('99', '10101010', 1);";
    $connection->exec($createTableSql);

    $connection->commit();
} catch (\PDOException $error) {
    echo $error->getMessage();
    $connection->rollBack();
}

