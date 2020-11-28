<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarCursos implements RequestHandlerInterface {
    private EntityManagerInterface $entityManager;
    private $courseRepository;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        $this->courseRepository = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $html = $this->renderHtml(
            'listar-cursos.php',
            [
                'title' => 'Listar cursos',
                'titleDocument' => 'Lista de cursos',
                'cursos' => $this->courseRepository->findAll()
            ]
        );
        return new Response(200, [],$html);
    }

    use RenderHtmlTrait;
}