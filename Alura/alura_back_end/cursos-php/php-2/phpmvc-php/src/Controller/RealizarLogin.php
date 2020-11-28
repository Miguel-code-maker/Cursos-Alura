<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMansageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface {

    private EntityManagerInterface $entityManager;

    private $repository;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Usuario::class);

    }

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $email = filter_var($request->getParsedBody()['email'], FILTER_VALIDATE_EMAIL); //filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_var($request->getParsedBody()['password'], FILTER_SANITIZE_STRING); //filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user = $this->repository->findOneBy(['email' => $email]);


        if (empty($email)) {
            $this->definedMensage('danger', 'O email que vc digitou não existe');
            return new Response(302, ['Location'=>'/login']);
        }

        /** @var Usuario $user */

        if (empty($password) || !$user->senhaEstaCorreta($password)) {
            $this->definedMensage('danger', 'Senha incorreta ou invalida');

            return new Response(302, ['Location'=>'/login']);
        }

        $_SESSION['login'] = true;
        return new Response(302, ['Location'=>'/listar-cursos']);
    }

    use FlashMansageTrait;
}