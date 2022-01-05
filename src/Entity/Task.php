<?php
namespace App\Entity;

use App\Entity\AbstractEntity;

class Task extends AbstractEntity
{
    private String $taskText;
    private bool $isDone;

  
    public function getTaskText()
    {
        return $this->taskText;
    }
    public function setTaskText(String $text)
    {
        $this->taskText = $text;
    }
    public function getIsDone()
    {
        return $this->isDone;
    }
    public function setIsDone(bool $isDone)
    {
        $this->isDone = $isDone;
    }
    public function populateData(array $query)
    {
        $this->setId($query['id']);
        $this->setTaskText($query['task']);
        $this->setIsDone($query['isDone']);
    }
}