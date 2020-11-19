<?php
namespace alura\banco\modelo\controller;
use alura\banco\modelo\Autenticar;
use alura\banco\modelo\funcionarios\Diretor;

class autenticador {
    public function login(Autenticar $diretor, $senha) {
        if ($diretor->autenticacao($senha)) {
            echo "autenticado com sucesso".PHP_EOL;
            return;
        }
        echo "falha na autenticação".PHP_EOL;
    }
}