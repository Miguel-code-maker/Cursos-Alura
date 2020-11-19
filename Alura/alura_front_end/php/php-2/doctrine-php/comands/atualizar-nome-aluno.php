<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$novoNome = $argv[2];

$aluno = $entityManager->find(Aluno::class, $id);
$aluno->setNome($novoNome);

$entityManager->flush();

//esse jeito de fazer é indo no repository do aluno mas não é necessario pq se for para buscar um aluno
//$alunoRepository = $entityManager->getRepository(Aluno::class);
//
//$aluno = $alunoRepository->find($id);
//$aluno->setNome($novoNome);
//
//$entityManager->flush();
