<?php
spl_autoload_register(function(string $nomeDoArquivo ) {
    $nomeDoArquivo = str_replace('alura\banco', '.', $nomeDoArquivo);
    $nomeDoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $nomeDoArquivo);
    $nomeDoArquivo .= '.php';

    if (file_exists($nomeDoArquivo)) {
        require_once $nomeDoArquivo;
    }
});
