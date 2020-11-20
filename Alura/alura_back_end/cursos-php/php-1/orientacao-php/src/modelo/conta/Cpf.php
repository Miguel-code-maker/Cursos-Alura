<?php
namespace alura\banco\modelo\conta;

use alura\banco\modelo\getsProps;

final class Cpf {
    private string $cpf;

    public function __construct(string $cpf) {
        $this->cpf = $cpf;
    }

    use getsProps;
}