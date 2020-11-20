<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$connection = new EntityManagerFactory();
$entityManager = $connection->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];
/** @var Aluno $aluno */
$aluno = $entityManager->find(Aluno::class ,$idAluno);
/** @var Curso $curso */
$curso = $entityManager->find(Curso::class, $idCurso);

$aluno->addCursos($curso);

$entityManager->flush();
