<?php
// Defina aqui como construir cada um dos seus controllers e suas dependências
return [
    'Yamamoto\Teste\controller\VideoController' => function(\PDO $pdo) {
        $repository = new \Yamamoto\Teste\repository\VideoRepository($pdo);
        return new \Yamamoto\Teste\controller\VideoController($repository);
    },
    'Yamamoto\Teste\controller\UsersController' => function(\PDO $pdo) {
        $repository = new \Yamamoto\Teste\repository\UsersRepository($pdo);
        return new \Yamamoto\Teste\controller\UsersController($repository);
    },
];
