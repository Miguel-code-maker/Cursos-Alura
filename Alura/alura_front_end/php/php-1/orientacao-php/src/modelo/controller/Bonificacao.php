<?php


namespace alura\banco\modelo\controller;
use alura\banco\modelo\funcionarios\Funcionario;

class Bonificacao {

    private float $totalDeBunificacao = 0;

    public function adicionarBunificacao(Funcionario $funcionario): void {
        $this->totalDeBunificacao += $funcionario->calculaBonificacao();
    }

    /**
     * @return float
     */
    public function getTotalDeBunificacao(): float
    {
        return $this->totalDeBunificacao;
    }
}