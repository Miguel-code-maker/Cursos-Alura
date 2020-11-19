<?php
require_once 'vendor/autoload.php';

use Alura\Pdo\Domain\Repository\PdoStudentRepository;
use Alura\Pdo\Infraestrutura\Persistencia\ConnectionCreate;

$connection = ConnectionCreate::createConnetion('sqlite:', 'banco.sqlite');
$repository = new PdoStudentRepository($connection);


$studentList = $repository->studentsWithPhones();
print_r($studentList);