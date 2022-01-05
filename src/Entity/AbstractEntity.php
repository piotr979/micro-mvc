<?php
namespace App\Entity;

abstract class AbstractEntity
{
    protected int $id;

    protected function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
} 