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
        
        echo $this->render('users-list',['users' => $users]);
    }

    public function editarUsuario()
    {
        $id = $_GET['id'];
        $user = $this->UsersRepository->find($id);
        echo $this->render('edit-user', ['user' => $user]);

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