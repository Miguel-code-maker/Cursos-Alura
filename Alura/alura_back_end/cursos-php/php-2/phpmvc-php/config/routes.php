<?php

use Alura\Cursos\Controller\{AlterarCurso,
    CursoEmJson,
    CursosEmXml,
    DeletarCurso,
    InserirCursos,
    ListarCursos,
    Login,
    Logout,
    Percistencia,
    RealizarLogin};

return [
    '/listar-cursos' => ListarCursos::class,
    '/inserir-cursos' => InserirCursos::class,
    '/salvar-curso' => Percistencia::class,
    '/deletar-curso' => DeletarCurso::class,
    '/alterar-curso' => AlterarCurso::class,
    '/login' => Login::class,
    '/realizar-login' => RealizarLogin::class,
    '/logout' => Logout::class,
    '/cursos-json' => CursoEmJson::class,
    '/cursos-xml' => CursosEmXml::class
];