<?php


use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$connection = new EntityManagerFactory();
$entityManager = $connection->getEntityManager();
$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$classAluno = Aluno::class;
$dql = "SELECT a, t, c FROM $classAluno a JOIN a.telefones t JOIN a.cursos c";
$listaAlunos = $entityManager->createQuery($dql)->getResult();

foreach ($listaAlunos as $aluno) {
    /** @var Aluno $aluno */
    $telefones = $aluno->getTelefones()->map(function ($telefone) {
        /** @var Telefone $telefone */
        return $telefone->getNumero();
    })->toArray();
    echo "ID: " . $aluno->getId() . PHP_EOL;
    echo "NOME: " . $aluno->getNome() . PHP_EOL;
    echo "TELEFONE: " . implode(',', $telefones) . PHP_EOL;

    $cursos = $aluno->getCursos();
    foreach ($cursos as $curso) {
        /** @var Curso $curso */
        echo "\tID do Curso: " . $curso->getId() . PHP_EOL;
        echo "\tNome do Curso: " . $curso->getNome() . PHP_EOL;
        echo PHP_EOL;
    }
    echo PHP_EOL;


}
echo PHP_EOL;
foreach ($debugStack->queries as $queryInfo) {
    echo $queryInfo['sql'] . PHP_EOL;
}