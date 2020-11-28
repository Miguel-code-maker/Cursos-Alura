<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class InserirCursos implements RequestHandlerInterface {
    public function handle(ServerRequestInterface $request): ResponseInterface {
        $titleDocument = "Formulario de cursos";
        $title = "Cadastrar novo curso";
        $html = $this->renderHtml(
            'inserir-cursos.php',
            [
                'title' => 'Formulario de cursos',
                'titleDocument' => 'Cadastrar novo cursos'
            ]
        );
        return new Response(200, [], $html);
    }

    use RenderHtmlTrait;
}