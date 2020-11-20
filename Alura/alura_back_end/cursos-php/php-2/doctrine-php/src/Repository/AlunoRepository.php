<?php


namespace Alura\Doctrine\Repository;


use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository {
    //forma de fazer a dql estilo doctrine
    public function buscarCursosPorAluno() {
        $classAluno = Aluno::class;
        $query = $this->createQueryBuilder('a')
            ->join('a.telefones', 't')
            ->join('a.cursos', 'c')
            ->addSelect('c')
            ->addSelect('t')
            ->getQuery();

        return $query->getResult();
    }

    //forma de fazer a dql estilo slq
    private function buscarCursosPorAluno2() {
        $entityManeger = $this->getEntityManager();
        $classAluno = Aluno::class;
        $dql = "SELECT a, c, t from $classAluno a JOIN a.telefones t JOIN a.cursos c";
        $query = $entityManeger->createQuery($dql);

        return $query->getResult();
    }
}