<?php
namespace Yamamoto\Teste\repository;
use Yamamoto\Teste\Entity\Users;
use PDO;
use PDOException;

class UsersRepository
{
    public function __construct(private PDO $pdo)
    {

    }
    public function all()
    {
         $userList = $this->pdo
        ->query('SELECT * from users;')
        ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            $this->hidrateUser(...),
            $userList
        ); 
       
    }
    public function find(int $id)
    {
        $sql = 'SELECT * FROM users WHERE id =:id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        var_dump($user);

        $user1 = $this->hidrateUser($user);

        var_dump($user1);


    }

    public function create(array $user)
    {   
        try 
        {
            $sql = "INSERT INTO users ( email, password)
                VALUES (:email, :password )";
                
            $email = $user['email'];
            $password = $user['password'];

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':email' => $email,
                'password' => $password,

            ]);
            
            return $this->pdo->lastInsertId();

        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
        
        

         
    }

    public function delete()
    {

    }

    public function hidrateUser(array $userData) : Users
    {
        $user = new Users($userData['email'], $userData['password']);
        $user->setId($userData['id']);

        return $user;
    }
}