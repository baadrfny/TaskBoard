<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class DashboardController extends Controller
{
    public function index(){

        $totalTasks = Task::count();
        $todoTasks = Task::where('status','En attente')->count();
        $doingTasks = Task::where('status','En cours')->count();
        $completedTasks = Task::where('status', 'Terminé')->count();
        $overdueTasks = Task::where('deadline', '<', now())
            ->where('status', '!=', 'Terminé')
            ->count();
        $percentTask = $totalTasks > 0 ? 
            round(($completedTasks / $totalTasks ) * 100 ): 0; 
        $tasks = Task::orderBy('deadline', 'asc')->get();
        return view('dashboard', compact('totalTasks', 'todoTasks', 'doingTasks','completedTasks','overdueTasks','percentTask','tasks'));
    }


}
