<?php
namespace Alura\Cursos\Helper;

trait RenderHtmlTrait {
    public function renderHtml(string $file, array $args): string {
        extract($args);
        ob_start();
        include __DIR__ . "/../../view/Routes/$file";
        return ob_get_clean();
    }
}