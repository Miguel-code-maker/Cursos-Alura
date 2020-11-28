<?php
namespace Alura\Cursos\Helper;

trait FlashMansageTrait {

    public function definedMensage(string $typeMensage, string $mensagem): void {
        $_SESSION['mensagem'] = $mensagem;
        $_SESSION['mensagem-tipo'] = $typeMensage;
    }

}