<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id') -> get();
        return view('task.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskRequest $request)
    {
        $request -> validated();

        Task::create([
            'title' => $request -> title,
            'description' => $request -> description,
        ]);
        return redirect() -> route('task.index') -> with('success','Task added successful!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
