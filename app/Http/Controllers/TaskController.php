<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    //show all tasks
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|min:2',
            'deadline' => 'required|date|after_or_equal:today',

        ]);



        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'status' => 'En attente',
            'user_id' => Auth::id(),
        ]);



        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
        'title' => 'required|min:2',
        'deadline' => 'required|date|after_or_equal:today']);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche modifiée!');
    }


    public function destroy(Task $task)
    {
        
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée!');
    }
}
