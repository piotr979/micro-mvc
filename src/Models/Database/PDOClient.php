<?php

namespace App\Models\Database;

use App\Models\Database\Database;
use App\Exception\ConnectionException;
use App\Models\Entity\Task;
use App\Helpers\Url;
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
   public function taskProcess(Task $task)
   {
  
    if ($task->getId() == null) {
        $sql = "INSERT INTO task (task) VALUES (:content)";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindValue(':content', $task->getTaskText());
        $stmt->execute();
    } else {
     
        $sql = "UPDATE task SET task = :content WHERE id = :id";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindValue(':content', $task->getTaskText(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }
    Url::redirect('/');
   }
   public function deleteTask($id)
   {
       $sql = "DELETE FROM task WHERE id = :id";
       $stmt = $this->getConn()->prepare($sql);
       $stmt->bindValue(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
       Url::redirect('/');
   }
}