<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\PdoStudentRepository;
use Alura\Pdo\Infraestrutura\Persistencia\ConnectionCreate;


require_once 'vendor/autoload.php';

$pdo = ConnectionCreate::createConnetion('sqlite:', 'banco.sqlite');

$repository = new PdoStudentRepository($pdo);

$studentList = $repository->allStudents();

print_r($studentList);