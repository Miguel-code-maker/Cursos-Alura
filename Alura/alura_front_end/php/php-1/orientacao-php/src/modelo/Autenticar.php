<?php
namespace alura\banco\modelo;


interface Autenticar {

    public function autenticacao(string $senha): bool;
}