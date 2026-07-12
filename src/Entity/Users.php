<?php
declare (strict_types=1);

namespace Yamamoto\Teste\Entity;

final class Users 
{
    public readonly int $id;
    public readonly string $email;
    public readonly string $password;

    public function __construct(
        string $email,
        string $password
    )
    {
        $this->setEmail($email);
        $this->setPassword($password);
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword(string $password)
    {
        $password = password_hash($password, PASSWORD_ARGON2ID);
        $this->password = $password;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}