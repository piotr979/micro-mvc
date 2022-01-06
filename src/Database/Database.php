<?php

declare(strict_types = 1);

namespace App\Database;

abstract class Database
{
    protected $connHandler;
    protected $statement;
    protected $host, $db_name, $db_user, $db_password;

    public function __construct($host, $db_name, $db_user, $db_password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->db_password = $db_password;
        $this->db_user = $db_user;
    }
    abstract public function connect();
     
    public function select($sql)
    {
        $this->statement = $this->connHandler->query('SELECT * FROM task');
        return $this;
    }

    public function getConn()
    {
        return $this->connHandler;
    }

    abstract public function getAll();
}