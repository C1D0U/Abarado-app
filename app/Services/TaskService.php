<?php

namespace App\Services;

class TaskService
{
    private $tasks = [];

    public function add($task)
    {
        $this->tasks[] = $task;
        return $task;
    }

    public function getAllTasks()
    {
        return $this->tasks;
    }
}