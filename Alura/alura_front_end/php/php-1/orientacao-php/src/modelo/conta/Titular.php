<?php
namespace alura\banco\modelo\conta;
use alura\banco\modelo\Autenticar;
use alura\banco\modelo\getsProps;
use alura\banco\modelo\Pessoas;
use alura\banco\modelo\Endereco;

class Titular extends Pessoas implements Autenticar {

    private Endereco $endereco;

    public function __construct(string $nome, Cpf $cpf, Endereco $endereco) {

        parent::__construct($nome, $cpf);

        $this->endereco = $endereco;
    }

    //methds
    public function autenticacao(string $senha): bool {
        if ($senha != '123') return false;
        return true;
    }

    //gets
    /**
     * @return Endereco
     */
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    //__Gets
    use getsProps;
}
