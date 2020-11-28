<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__.'/vendor/autoload.php';

use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityManager = (new EntityManagerCreator())->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
