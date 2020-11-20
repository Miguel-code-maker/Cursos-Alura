<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Infraestrutura\Persistencia\ConnectionCreate;

$pdo = ConnectionCreate::createConnetion('sqlite:', 'banco.sqlite');

$sqlDelet = "DELETE FROM students WHERE id = ?;";

$prepare = $pdo->prepare($sqlDelet);
$prepare->bindValue(1, 4, PDO::PARAM_INT);

if ($prepare->execute()) {
    echo "students delete".PHP_EOL;
}


