<?php

use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__.'/vendor/autoload.php';

$entityMangerFactory = new EntityManagerFactory();
$entityManager = $entityMangerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
