<?php
declare(strict_types=1);

require __DIR__ . '/../config/config.php';
//carrega o autoload do composer 
require_once __DIR__ . '/../vendor/autoload.php';

// carrega a lista de rotas 
$routes = require_once __DIR__ . '/../config/routes.php';

// captura a URL e o Metodo HTTP atuais 
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

// Processa a rota
if(array_key_exists($key, $routes)) {
    //separa a classe e o metodo que configuramos no routes.php
    [$controllerClass, $method] = $routes[$key];
    
    if ($controllerClass === 'Yamamoto\Teste\controller\VideoController')
    {
        $param = new Yamamoto\Teste\repository\VideoRepository($pdo);
    } elseif ($controllerClass === 'Yamamoto\Teste\controller\UsersController') {
        $param = new Yamamoto\Teste\repository\UsersRepository($pdo);
    } else {
      $param = '';  
    } 
    $controller = new $controllerClass($param);

    $controller->$method();

} else {
    http_response_code(404);
    echo "Página não encontrada";
}

