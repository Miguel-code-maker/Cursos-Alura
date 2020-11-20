<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$connection = new EntityManagerFactory();
$entityManager = $connection->getEntityManager();
$classAluno = Aluno::class;
$dql = "SELECT count(a) FROM $classAluno a";
$totalAlunos = $entityManager->createQuery($dql)->getSingleScalarResult();

echo "Total de alunos: ". $totalAlunos;
