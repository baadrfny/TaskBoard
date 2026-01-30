<?php

namespace App\View\Components;

use App\Models\Task;
use Illuminate\Container\Attributes\Tag;
use Illuminate\View\Component;
use Illuminate\View\View;
// use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request;


class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }

    //
    public function create(){
        //take u to create page
        return view('task.create');
    }


    public function store(Request $request){
        //read data from user Form and take him to index page
        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function show(){
        return view('tasks.show' , compact('task'));
    }

    

    public function edit(){
        return view('tasks.edit',compact('task'));
    }

    //Request $request = data li kaysift user mn FORM
    //Task $task = kayjib task kamla machi ghir id
    public function update(Request $request , Task $task){
        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('tasks.index');
    }
    
}
