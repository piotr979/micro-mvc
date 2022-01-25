<?php
namespace App\Models\Entity;

abstract class AbstractEntity
{
    protected ?int $id = null;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
} 