<?php
namespace Yamamoto\Teste\controller;
use Yamamoto\Teste\repository\UsersRepository;

class UsersController extends Template
{
    public function __construct(private UsersRepository $UsersRepository)
    {
        
    }
    public function index()
    {
        $users = $this->UsersRepository->all();
        var_dump($users);
    }

    public function CriarUsuario()
    {
        echo $this->render('user-form');
    }

    public function NovoUsuario()
    {
        $post = $_POST;
        $this->UsersRepository->create($post);
        
    }
}