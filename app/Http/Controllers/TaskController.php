<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all(); // Para exibir as categorias no filtro

        $tasks = Task::query();
    
        if ($request->has('category_id') && $request->category_id != '') {
            $tasks->where('category_id', $request->category_id);
        }
    
        $tasks = $tasks->paginate(9);
    
        return view('task.index', ['tasks' => $tasks, 'categories' => $categories]);
    }

    public function create()
    {
        $categories = Category::all(); // Buscar todas as categorias
        return view('task.create', compact('categories'));
    }

    public function store(TaskRequest $request)
    {
        $request -> validated();

        Task::create([
            'title' => $request -> title,
            'description' => $request -> description,
            'category_id' => $request -> category_id, // Aqui estamos associando a categoria
        ]);
        return redirect() -> route('task.index') -> with('success','Task added successful!');
    }

    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('task.edit', ['task'=> $task]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $request -> validate([
            'title'=> 'required|max:255',
            'description'=> 'required',
        ]);

        $task->update([
            'title'=> $request -> title,
            'description'=> $request -> description,
        ]);

        return redirect() -> route('task.index', ['task' => $task]) -> with('success','Note added successful!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect() -> route('task.index') -> with('success','Note deleted successful!');
    }
}
