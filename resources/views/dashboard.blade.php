@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-[#0f172a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white uppercase tracking-tight">Dashboard</h1>
                <p class="text-gray-400">Aperçu de vos tâches et de votre progression</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-3xl flex justify-between items-center shadow-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total des tâches</p>
                        <p class="text-4xl font-black text-cyan-500 mt-2">{{ $totalTasks }}</p>
                    </div>
                    <div class="bg-cyan-500 p-4 rounded-2xl shadow-lg shadow-cyan-200">
                        <i class="fas fa-clipboard-check text-white text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl flex justify-between items-center shadow-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">À faire</p>
                        <p class="text-4xl font-black text-slate-700 mt-2">{{ $todoTasks }}</p>
                    </div>
                    <div class="bg-slate-400 p-4 rounded-2xl shadow-lg shadow-slate-200">
                        <i class="fas fa-tasks text-white text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl flex justify-between items-center shadow-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">En cours</p>
                        <p class="text-4xl font-black text-amber-500 mt-2">{{ $doingTasks }}</p>
                    </div>
                    <div class="bg-amber-500 p-4 rounded-2xl shadow-lg shadow-amber-200">
                        <i class="fas fa-hourglass-half text-white text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl flex justify-between items-center shadow-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Complétées</p>
                        <p class="text-4xl font-black text-green-500 mt-2">{{ $completedTasks }}</p>
                    </div>
                    <div class="bg-green-500 p-4 rounded-2xl shadow-lg shadow-green-200">
                        <i class="fas fa-check-double text-white text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl flex justify-between items-center shadow-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">En retard</p>
                        <p class="text-4xl font-black text-red-500 mt-2">{{ $overdueTasks }}</p>
                    </div>
                    <div class="bg-red-500 p-4 rounded-2xl shadow-lg shadow-red-200">
                        <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl flex justify-between items-center shadow-lg border border-gray-100">
                    <div>
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Taux de complétion</p>
                        <p class="text-4xl font-black text-purple-600 mt-2">{{ $percentTask }}%</p>
                    </div>
                    <div class="bg-purple-500 p-4 rounded-2xl shadow-lg shadow-purple-200">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection