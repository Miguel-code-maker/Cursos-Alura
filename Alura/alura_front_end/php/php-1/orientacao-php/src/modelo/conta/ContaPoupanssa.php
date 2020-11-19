<?php
namespace alura\banco\modelo\conta;


class ContaPoupanssa extends Conta {

    protected function taxa(): float {
        return 0.03;
    }

}