<?php
namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface {

    public function handle(ServerRequestInterface $request): ResponseInterface {
        $html = $this->renderHtml(
            'login.php',
            [
                'titleDocument' => 'Login',
                'title' => 'Login'
            ]
        );
        return new Response(200, [], $html);
    }
    use RenderHtmlTrait;
}