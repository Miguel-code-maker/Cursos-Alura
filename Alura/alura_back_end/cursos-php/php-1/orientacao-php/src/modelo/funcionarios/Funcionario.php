<?php
namespace alura\banco\modelo\funcionarios;
use alura\banco\modelo\getsProps;
use alura\banco\modelo\Pessoas;
use alura\banco\modelo\conta\Cpf;

abstract class Funcionario extends Pessoas {
    private float $salario;

    public function __construct($nome, Cpf $cpf, $salario)
    {

        parent::__construct($nome, $cpf);
        $this->salario = $salario;
    }

    //methods
    abstract public function calculaBonificacao(): float;

    public function almento($almento) {
        if ($almento < 0) {
            echo "almento não pode ser menor que zero";
            return;
        }
        $this->salario += $almento;
    }

    //gets
    public function getCargo(): string
    {
        return $this->Cargo;
    }

    public function getSalario(): float {
        return $this->salario;
    }

    //__Gets
    use getsProps;
}