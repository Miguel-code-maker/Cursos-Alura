<?php


namespace alura\banco\modelo\funcionarios;


class Desenvolvedor extends Funcionario {
    public function nevelUpDev() {
        $this->almento($this->getSalario() * 0.75);
    }

    public function calculaBonificacao(): float {
        return 500.0;
    }
}