<?php
namespace alura\banco\modelo\funcionarios;
use alura\banco\modelo\Autenticar;

class Gerente extends Funcionario implements Autenticar {

    public function calculaBonificacao(): float {
        return $this->getSalario();
    }

    public function autenticacao(string $senha): bool {
        if ($senha != '123') return false;
        return true;
    }
}