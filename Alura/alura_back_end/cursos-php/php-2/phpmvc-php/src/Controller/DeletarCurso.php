<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMansageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class DeletarCurso implements RequestHandlerInterface {

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT); //filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (empty($id)) {
            $this->definedMensage('danger', 'Esse curso não existe');
            return new Response(302, ['Location' => '/listar-cursos']);
        }
        $course = $this->entityManager->getReference(Curso::class, $id);
        $this->entityManager->remove($course);
        $this->entityManager->flush();
        $this->definedMensage('success', "Curso excluido com sucesso");
        return new Response(302, ['Location'=>'/listar-cursos']);
    }
    use FlashMansageTrait;
}