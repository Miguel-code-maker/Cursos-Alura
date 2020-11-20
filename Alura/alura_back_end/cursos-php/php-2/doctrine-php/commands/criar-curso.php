<?php

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__.'/../vendor/autoload.php';

$connection = new EntityManagerFactory();
$entityManager = $connection->getEntityManager();
/** @var Curso $curso */
$curso = new Curso();
$curso->setNome($argv[1]);

$entityManager->persist($curso);

$entityManager->flush();