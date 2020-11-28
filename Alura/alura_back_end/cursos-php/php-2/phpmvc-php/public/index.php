<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__. '/../vendor/autoload.php';

$way = $_SERVER['PATH_INFO'];
$routes = require __DIR__.'/../config/routes.php';

if (!array_key_exists($way, $routes)) {
    echo "eror 404";
    http_response_code(404);
    exit();
}

session_start();

$ehLogin = stripos($way, 'login');
if (!isset($_SESSION['login']) && $ehLogin == false) {
    header('Location: /login');
    exit();
} else if ($_SESSION['login'] && $way == '/login') {
    header('Location: /listar-cursos');
    exit();
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$controllerClass = $routes[$way];

/** @var ContainerInterface $controller */
$container = require __DIR__ .'/../config/dependencies.php';

/** @var RequestHandlerInterface $controller */
$controller = $container->get($controllerClass);

$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();