<?php

spl_autoload_register(function ($nome) {
    $nome = str_replace('alura\\arrays', '.', $nome);
    $nome = str_replace('\\', DIRECTORY_SEPARATOR, $nome);
    $nome .= '.php';
    if (file_exists($nome)) {
        require_once $nome;
    }
});

