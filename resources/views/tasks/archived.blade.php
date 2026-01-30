@extends('layouts.app')

@section('content')
<div class="py-12 bg-[#0f172a] min-h-screen">
    <div class="max-w-3xl mx-auto px-4">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-white">Tâches Archivées</h1>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-semibold transition flex items-center gap-2 text-sm">
                <i class="fas fa-arrow-left"></i> Retour aux tâches
            </a>
        </div>

        @if($tasks->count() > 0)
            <div class="space-y-4">
                @foreach($tasks as $task)
                <div class="bg-gray-800 rounded-3xl p-6 shadow-sm border border-gray-700 relative opacity-75">
                    
                    <div class="absolute top-6 right-6 flex gap-3">
                        <!-- Restore Button -->
                        <form action="{{ route('tasks.restore', $task->id) }}" method="POST" onsubmit="return confirm('Restaurer cette tâche ?')" class="inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="text-green-400 hover:text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </button>
                        </form>
                        <!-- Permanent Delete Button -->
                        <form action="{{ route('tasks.forceDelete', $task->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cette tâche ?')" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="flex gap-2 mb-4">
                        <span class="bg-gray-600 text-gray-300 px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 uppercase">
                            <i class="fas fa-archive"></i>
                            ARCHIVÉE
                        </span>
                        <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-bold uppercase">
                            {{ $task->priority ?? 'MOYENNE' }}
                        </span>
                    </div>

                    <h3 class="text-2xl font-bold text-gray-300 mb-2">{{ $task->title }}</h3>
                    <p class="text-gray-400 mb-4">{{ $task->description }}</p>

                    <div class="flex items-center gap-2 text-gray-400 text-sm mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Archivée le: {{ \Carbon\Carbon::parse($task->deleted_at)->format('d F Y à H:i') }}
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">
                    <i class="fas fa-archive"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-300 mb-2">Aucune tâche archivée</h3>
                <p class="text-gray-400">Vos tâches archivées apparaîtront ici</p>
            </div>
        @endif
    </div>
</div>
@endsection