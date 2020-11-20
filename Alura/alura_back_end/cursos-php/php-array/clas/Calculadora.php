<?php declare(strict_types=1);
namespace alura\arrays\clas;

class Calculadora {
    public function CalculaMedia($notas): ?string {
        if (sizeof($notas) > 0) {
            $totalNotas = 0;
            foreach ($notas as $materia => $nota) {
                $totalNotas += $nota;
            }
            $media = $totalNotas / sizeof($notas);
            return "<p>media das notas: $media</p>";
        }
        return "<p>Notas invalidas!!</p>";
    }
}