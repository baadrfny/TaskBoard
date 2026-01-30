@extends('layouts.app')

@section('content')
<div class="py-12 bg-[#0f172a] min-h-screen">
    <div class="max-w-3xl mx-auto px-4">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-white">Gestion des Tâches</h1>
            <a href="{{ route('tasks.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-lg font-semibold transition flex items-center gap-2 text-sm">
                <i class="fas fa-plus"></i> Nouvelle Tâche
            </a>
        </div>

        <div class="space-y-4">
            @foreach($tasks as $task)
            <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100 relative">
                
                <div class="absolute top-6 right-6 flex gap-3">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-cyan-400 hover:text-cyan-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="flex gap-2 mb-4">
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 uppercase">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ $task->status }}
                    </span>
                    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-bold uppercase">
                        {{ $task->priority ?? 'MOYENNE' }}
                    </span>
                </div>

                <h3 class="text-2xl font-bold text-slate-800 mb-2">{{ $task->title }}</h3>
                <p class="text-slate-500 mb-4">{{ $task->description }}</p>

                <div class="flex items-center gap-2 text-slate-400 text-sm mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Échéance: {{ \Carbon\Carbon::parse($task->deadline)->format('d F Y') }}
                </div>

                <hr class="border-gray-100 mb-6">

                <div class="flex items-center gap-4">
                    <span class="text-slate-700 font-bold text-sm">Changer le statut:</span>
                    
                    <div class="flex bg-gray-100 p-1 rounded-2xl gap-1">
                        <button class="px-4 py-2 rounded-xl text-sm font-semibold text-slate-600 flex items-center gap-2 hover:bg-white transition">
                            <i class="fas fa-list-ul"></i> À faire
                        </button>
                        <button class="px-4 py-2 rounded-xl text-sm font-semibold text-slate-600 flex items-center gap-2 hover:bg-white transition">
                            <i class="far fa-clock"></i> En cours
                        </button>
                        <button class="px-4 py-2 rounded-2xl text-sm font-semibold bg-cyan-400 text-white flex items-center gap-2 shadow-md">
                            <i class="fas fa-check-circle"></i> Terminé
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection