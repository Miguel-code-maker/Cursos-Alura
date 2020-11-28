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

class Percistencia implements RequestHandlerInterface {

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $descricao = filter_var($request->getParsedBody()['descricao'], FILTER_SANITIZE_STRING); /*filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );*/

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT); //filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!empty($id)) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->definedMensage('success', 'Cursos atualizado com sucesso');
        } else {
            $this->entityManager->persist($curso);
            $this->definedMensage('success', 'Cursos inserido com sucesso');
        }
        $this->entityManager->flush();

        return new Response(302,['Location'=>'/listar-cursos']);
    }

    use FlashMansageTrait;
}

/*
 * validations:
 * functions: filter_input or filter_var
 * -- filter_input()
 * 1° types for for input: INPUT_POST or INPUT_GET
 * 2° variable_name: name of input from form
 * 3° filter: FILTER_SANITIZE_STRING or FILTER_VALIDATION_INT
 * -- filter for filter_var()
 * 1° param is varivavel
 * 2° filter
 *
 */