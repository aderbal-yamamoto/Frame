<?php
declare(strict_types=1);

namespace Yamamoto\Teste\controller;

use Yamamoto\Teste\repository\VideoRepository;

class VideoController extends Template
{
    // O construtor garante que o banco de dados (repositório) estará disponível
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    // Método para a página inicial
    public function index(): void
    {
        $videos = $this->videoRepository->all();
        echo $this->render('video-list',['videos' => $videos]);
    }

    // Método para a página de criação
    public function create(): void
    {
       echo $this->render('video-form');
    }

    public function novoVideo()
    {
        var_dump($_POST);
    }

    // Método que recebe o POST do formulário
    public function store(): void
    {
        // Código para salvar usando $this->videoRepository->add(...)
        echo "Vídeo salvo com sucesso!";
    }
}