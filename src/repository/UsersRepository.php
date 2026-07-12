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
        
        return $user = $statement->fetch(PDO::FETCH_ASSOC);
        
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
                ':password' => $password,

            ]);
            
            return  [
                "success" => true,
                "id" =>$this->pdo->lastInsertId()
            ];

        } catch (PDOException $e) {
            return [
                "success" => false,
                "error" => $e->getMessage()
            ];
        }
        
    }

    public function update(array $user)
    {
        $user = $this->hidrateUser($user);
       
        try
        {
            $sql = "UPDATE users 
            SET email = :email, password = :password
            WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':email' => $user->email,
                ':password' => $user->password,
                ':id' => $user->id
            ]);

             return [
            "success" => true,
            "message" => "Usuário atualizado com sucesso!",
            "updated" => $stmt->rowCount()
        ];
        } catch(PDOException $e) {
            return [
                "success" => false,
                "error" => $e->getMessage()
            ];
        }
    }

    public function delete(int $id)
    {
        try
        {
            $sql = "DELETE FROM users WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([':id' => $id]);

            return 
            [
                "sucess" => true,
                "message" => ' Usuário removido com sucesso!',
                "deleted" => $stmt->rowCount()
            ];
        } catch (PDOException $e) {
            return 
        [
            "success" => false,
            "error" => $e->getMessage()
        ];
        }
    }

    public function verifyPassword(string $email, string $password)
{
    try 
    {
        $sql = "SELECT id, email, password 
                FROM users 
                WHERE email = :email";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':email' => $email
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return false;

    } catch (PDOException $e) {

        return false;
    }
}
    

    public function hidrateUser(array $userData) : Users
    {
        $user = new Users($userData['email'], $userData['password']);
        $user->setId($userData['id']);

        return $user;
    }
}