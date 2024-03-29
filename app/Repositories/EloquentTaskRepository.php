<?php

namespace App\Repositories;

use App\Models\Task;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    public function all()
    {
        return Task::all();
    }

    public function create(array $data)
    {
        return Task::create($data);
    }

    public function find(int $id)
    {
        return Task::findOrFail($id);
    }

    public function update(array $data, int $id)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete(int $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
    }
}
