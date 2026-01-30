@extends('layouts.app')

@section('content')
    <div class="p-6">

        <h2 class="text-2xl font-bold mb-4">Modifier la tâche</h2>

        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div class="mb-2">
                <input type="text" name="title" value="{{ $task->title }}" placeholder="Titre de la tâche" class="border p-2 w-full text-black">
            </div>

            <!-- Description -->
            <div class="mb-2">
                <textarea name="description" placeholder="Description" class="border p-2 w-full text-black">{{ $task->description }}</textarea>
            </div>

            <!-- Deadline -->
            <div class="mb-2">
                <input type="date" name="deadline" value="{{ $task->deadline }}" class="border p-2 w-full text-black">
            </div>

            <!-- Priority -->
            <div class="mb-2">
                <select name="priority" class="border p-2 w-full text-black">
                    <option value="Basse" {{ $task->priority == 'Basse' ? 'selected' : '' }}>Basse</option>
                    <option value="Moyenne" {{ $task->priority == 'Moyenne' ? 'selected' : '' }}>Moyenne</option>
                    <option value="Haute" {{ $task->priority == 'Haute' ? 'selected' : '' }}>Haute</option>
                </select>
            </div>

            <!-- Status -->
            <div class="mb-2">
                <select name="status" class="border p-2 w-full text-black">
                    <option value="En attente" {{ $task->status == 'En attente' ? 'selected' : '' }}>En attente</option>
                    <option value="En cours" {{ $task->status == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Terminé" {{ $task->status == 'Terminé' ? 'selected' : '' }}>Terminé</option>
                </select>
            </div>

            <!-- Boutons -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Modifier</button>
            <a href="{{ route('tasks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Annuler</a>
        </form>

    </div>
@endsection