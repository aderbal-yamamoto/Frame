<?php
declare(strict_types=1);

require __DIR__ . '/../config/config.php'; // Garante que $pdo existe aqui
require_once __DIR__ . '/../vendor/autoload.php';

$routes = require_once __DIR__ . '/../config/routes.php';
$container = require_once __DIR__ . '/../config/dependencies.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];
$key = "$httpMethod|$pathInfo";

if (array_key_exists($key, $routes)) {
    [$controllerClass, $method] = $routes[$key];

    // Verifica se sabemos como construir esse controller no contêiner
    if (!isset($container[$controllerClass])) {
        http_response_code(500);
        echo "Erro interno: Controller não configurado nas dependências.";
        exit;
    }

    // Instancia o controller chamando a função anônima correspondente
    $controller = $container[$controllerClass]($pdo);
    
    // Executa a ação
    $controller->$method();
} else {
    http_response_code(404);
    echo "Página não encontrada";
}
