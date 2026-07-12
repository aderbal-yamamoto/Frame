<?php
declare(strict_types=1);

namespace Yamamoto\Teste\controller;

use RuntimeException;

abstract class Template
{
    protected function render(string $view, array $dados = []): string
    {
        $header = __DIR__ . "/../../views/header.php";
        $footer = __DIR__ . "/../../views/footer.php";
        $path = __DIR__ . "/../../views/{$view}.php";

        if (!file_exists($path)) {
            throw new RuntimeException("View '{$view}' não encontrada.");
        }

        // Cria variáveis a partir do array
        extract($dados);

        ob_start();

        require $header;
        require $path;
        require $footer;

        return ob_get_clean();
    }
}