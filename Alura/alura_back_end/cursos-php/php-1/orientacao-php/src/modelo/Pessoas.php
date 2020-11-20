<?php
namespace alura\banco\modelo;
use alura\banco\modelo\conta\Cpf;

class Pessoas {
    protected string $nome;
    protected Cpf $cpf;

    public function __construct($nome, Cpf $cpf) {
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    //meths
    final protected function validaNome($nome): void {
        if (strlen($nome) < 5) {
            echo "nome do titular $nome tem que ser maior que 5 caracteres".PHP_EOL;
            exit();
        }
    }

    // gets

    public function getNome(): string {
        return $this->nome;
    }

    public function getCpf(): Cpf {
        return $this->cpf;
    }


    //__Gets
    use getsProps;

}