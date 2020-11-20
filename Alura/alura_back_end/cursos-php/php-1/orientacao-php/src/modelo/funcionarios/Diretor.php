<?php
namespace alura\banco\modelo\funcionarios;
use alura\banco\modelo\Autenticar;

class Diretor extends Funcionario implements Autenticar {
    public function calculaBonificacao(): float
    {
        return $this->getSalario() * 2;
    }

    public function autenticacao(string $senha): bool {
        if ($senha != '123') return false;
        return true;
    }
}