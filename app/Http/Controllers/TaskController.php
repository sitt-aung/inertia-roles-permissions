<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return inertia()->render('Tasks/Index', [
            'tasks' => $tasks,
            'can'   => [
                'createTask' => auth()->user()->can('task_create'),
                'editTask' => auth()->user()->can('task_edit'),
                'destroyTask' => auth()->user()->can('task_destroy'),
            ],
        ]);
    }

    public function create()
    {
        $this->authorize('task_create');

        return inertia()->render('Tasks/Create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->authorize('task_create');

        Task::create($request->validated());

        return to_route('tasks.index');
    }

    public function edit(Task $task)
    {
        $this->authorize('task_edit');

        return inertia()->render('Tasks/Edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('task_edit');

        $task->update($request->validated());

        return to_route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $this->authorize('task_destroy');

        $task->delete();

        return to_route('tasks.index');
    }
}
