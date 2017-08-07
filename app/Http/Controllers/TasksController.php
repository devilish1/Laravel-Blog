<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.showall', compact('tasks'));
    }

    public function show(Task $task)
    {
        //dd($task);
        //$task = Task::find($id)->body;
        return view('tasks.showone', compact('task'));
    }
}
