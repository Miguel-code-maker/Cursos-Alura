<?php
namespace alura\banco\modelo\conta;

class ContaCorrente extends Conta {

    protected function taxa(): float {
        return 0.05;
    }

}