<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderHtmlTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AlterarCurso implements RequestHandlerInterface {

    private EntityManagerInterface $entityManager;

    private $repository;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Curso::class);

    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);  //filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (empty($id)) {
            echo "error esse curso não existe";
            return new Response(404);
        }

        /** @var Curso $curso */
        $curso = $this->repository->find($id);

        $html = $this->renderHtml(
            'inserir-cursos.php',
            [
                'title' => 'Alterar curso '. $curso->getDescricao(),
                'titleDocument' => 'Alterar Curso',
                'curso' => $this->repository->find($id)
            ]
        );

        return new Response(200,[],$html);
    }

    use RenderHtmlTrait;

}