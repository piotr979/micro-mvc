<?php

namespace App\Services;

use App\App;
use App\Helpers\Dump;
use App\Models\Entity\Task;

use App\Contracts\HandlingFormInterface;
class BasicFormService implements HandlingFormInterface
{
    private $expected = ['content', 'id'];
    private $required = ['content'];
    public static function processForm($formData)
    {
        if (!isset($formData['content']) || $formData['content'] == '') {
            $errors[] = "Field is required";
            return;
        }
        $task = new Task();
        $task->setIsDone(false);
        $task->setTaskText($formData['content']);
      
        if (isset($formData['id']) && !empty($formData['id'])) {
            $task->setId($formData['id']);
        } 
            App::$app->db->taskProcess($task);
    }
}