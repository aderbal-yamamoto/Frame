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

    public function editeUsuario()
    {   
        session_start();

        $user = $_POST;
        //criar função para update
        $resultado = $this->UsersRepository->update($user);
        $_SESSION['flash'] = [
        'type' => $resultado['success'] ? 'success' : 'danger',
        'message' => $resultado['message'] ?? $resultado['error']
        ];

        header("Location: users");
        exit;
    }

    public function CriarUsuario()
    {
        echo $this->render('user-form');
    }

    public function NovoUsuario()
    {
        $post = $_POST;
        $resultado = $this->UsersRepository->create($post);
        header("Location: users");
    }

    public function excluir()
    {   
        session_start();

        $id = $_GET['id'];
        $resultado = $this->UsersRepository->delete($id);

        $_SESSION['flash'] = [
        'type' => 'success',
        'message' => 'Usuário excluído com sucesso!'
        ];

        header("Location: users");
        exit;
    }

    public function verificar()
    {
        echo $this->render('login-form');
    }

    public function verify()
    {
        session_start();
        //var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = $this->UsersRepository->verifyPassword($email, $password);
        
        if($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email']
            ];
            header("Location: users");
            exit;
        } else {
            $_SESSION['flash'] = [
                'type' => 'danger',
                'message' => 'Email ou senha inválidos'
            ];
            header('Location: login');
            exit;
        }
        
        
    }
}