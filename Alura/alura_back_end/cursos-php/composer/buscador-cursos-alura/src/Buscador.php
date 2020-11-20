<?php
namespace Alura\BuscadorCursos;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require_once (__DIR__.'/../vendor/autoload.php');

class Buscador {

    protected string $clas;
    protected string $url;
    protected string $method;

    public function show($url, $seletor) {
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody();
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $cursos = $crawler->filter($seletor);
        foreach($cursos as $curso) {
            echo $curso->textContent.PHP_EOL.PHP_EOL;
        }
    }
}