<?php
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\PdoStudentRepository;
use Alura\Pdo\Infraestrutura\Persistencia\ConnectionCreate;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreate::createConnetion('sqlite:', 'banco.sqlite');
$repository = new PdoStudentRepository($pdo);

$students = [
    new Student(null, "Miguel Siqueira Reis", new \DateTimeImmutable('2005-04-18')),
    new Student(null, 'Miguel Reis', new \DateTimeImmutable('1999-12-15')),
    new Student(null, 'Santo grau', new \DateTimeImmutable('1995-02-22')),
    new Student(null, 'assasino nunca', new \DateTimeImmutable('1995-5-09')),
    new Student(null, 'ráquer perigoso', new \DateTimeImmutable('2001-06-05'))

];

foreach ($students as $student) {
    $repository->saveStudents($student);
}
