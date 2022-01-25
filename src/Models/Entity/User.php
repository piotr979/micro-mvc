<?php

declare(strict_types = 1);

namespace App\Models\Entity;

use App\Models\Entity\AbstractEntity;

class User extends AbstractEntity
{
    private string $email;
    private string $password;
    private string $role;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    
}