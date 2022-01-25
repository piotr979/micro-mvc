<?php

namespace App\Models\Database;

use App\Models\Database\Database;
use App\Exception\ConnectionException;
use PDO;
use PDOException;

class PDOClient extends Database
{
    private $dsn;

    public function __construct($driver, $host, $db_name, $db_user, $db_password)
    {
        parent::__construct($host, $db_name, $db_user, $db_password);
        $this->dsn = "{$driver}:host={$this->host};dbname={$this->db_name};
        charset=utf8";
    }
    public function connect()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->db_user, $this->db_password);
        } catch (\Throwable $e) {
            throw new ConnectionException("Connection error.", ['Could not connect'],2);
            exit;
        }
        return $this;
    }

    public function getAll()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserByEmail(string $email)
    {
       $sql = "SELECT user.id, email, password, user_role.role FROM user
       JOIN user_role ON user.role_id = user_role.id
       WHERE email ='{$email}'
       ";
       $stmt = $this->connection->query($sql);
       return $stmt->fetch(PDO::FETCH_OBJ);

    }
}