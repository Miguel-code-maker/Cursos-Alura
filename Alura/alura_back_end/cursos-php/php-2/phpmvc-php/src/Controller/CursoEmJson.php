<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Nyholm\Psr7\Response;


class CursoEmJson implements RequestHandlerInterface {

    private EntityManagerInterface $entityManager;

    private $repository;

    /**
     * cursoEmJson constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $cursos = $this->repository->findAll();
        return new Response(200, ['Content-Type' => 'application/json'], json_encode($cursos));
    }
}