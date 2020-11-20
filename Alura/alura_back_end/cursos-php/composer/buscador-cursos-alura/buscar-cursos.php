<?php
require_once './vendor/autoload.php';
//require_once 'src/Buscador.php';
use Alura\BuscadorCursos\Buscador;

$busca = new Alura\BuscadorCursos\Buscador();

$busca->show('https://www.alura.com.br/cursos-online-programacao/php', 'span.card-curso__nome');
