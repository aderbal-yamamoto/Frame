<?php
namespace Yamamoto\Teste\repository;
use Yamamoto\Teste\Entity\Video;
use PDO;

class VideoRepository
{
    public function __construct(private PDO $pdo )
    {

    }

public function all()
    {
        //Criar o metodo de buscar os dados do banco
        $videoList = $this->pdo
        ->query('SELECT * FROM videos;')
        ->fetchAll(PDO::FETCH_ASSOC);
        
        return array_map(
            $this->hidrateVideo(...), 
        $videoList);
    }

    // A partir desse ponto precisa criar uma classe video na pasta Entity para trabalhar somente com objetos não com array
    public function hidrateVideo(array $videoData) : Video
    {
         $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);
        
        if($videoData['image_path']!==null){
            $video->setFilePath($videoData['image_path']);
        }
        
        return $video;
    }
    
}
