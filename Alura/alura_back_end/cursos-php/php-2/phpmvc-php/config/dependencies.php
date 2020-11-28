<?php

use Alura\Cursos\Infra\EntityManagerCreator;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

$containerBilder = new ContainerBuilder();
$containerBilder->addDefinitions([
    EntityManagerInterface::class => function ()  {
        return (new EntityManagerCreator())->getEntityManager();
    }
]);

return  $containerBilder->build();