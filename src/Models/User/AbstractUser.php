<?php

declare(strict_types = 1);

namespace App\Models\User;

abstract class AbstractUser
{
    protected string $email;
    protected string $password;
    protected $role;

    public function __construct(string $email, string $password )
    {
        $this->email = $email;
        $this->password = $password;

    }
} 