<?php

use Yamamoto\Teste\controller\SobreController;
use Yamamoto\Teste\controller\VideoController;
use Yamamoto\Teste\controller\NewVideoController;
use Yamamoto\Teste\controller\UsersController;

return[
    'GET|/' => [VideoController::class, 'index'],
    'GET|/sobre'=>[SobreController::class, 'index'], 
    'GET|/criar' => [VideoController::class, 'create'],  
    'POST|/criar' => [VideoController::class, 'novoVideo'],
    'GET|/users' => [UsersController::class, 'index'],
    'GET|/criarusuario' => [UsersController::class, 'criarUsuario'],
    'POST|/criarusuario' => [UsersController::class, 'novoUsuario' ],
    'GET|/edit-user'   => [UsersController::class, 'editarUsuario'],
];