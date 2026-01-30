@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-white mb-2">Nouvelle Tâche</h1>
        <p class="text-gray-400 text-lg">Créez une nouvelle mission pour votre équipe</p>
    </div>

    <div class="bg-[#1e293b]/50 p-8 rounded-3xl border border-gray-800 shadow-2xl backdrop-blur-sm">
        <div class="flex items-center gap-3 text-cyan-400 font-bold mb-8 text-xl">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Détails de la tâche</span>
        </div>

        <form method="POST" action="{{ route('tasks.store') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2 ml-1">Titre de la tâche</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                        <i class="fa-solid fa-heading"></i>
                    </span>
                    <input type="text" name="title" placeholder="Ex: Développer l'API"
                        class="w-full bg-[#0f172a] border-gray-700 rounded-2xl focus:border-cyan-500 focus:ring-cyan-500 text-white p-4 pl-12 transition-all duration-300">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2 ml-1">Description</label>
                <textarea name="description" rows="4" placeholder="Décrivez les objectifs..."
                    class="w-full bg-[#0f172a] border-gray-700 rounded-2xl focus:border-cyan-500 focus:ring-cyan-500 text-white p-4 transition-all duration-300"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2 ml-1">Date d'échéance (Deadline)</label>
                    @error('deadline')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                        <input type="date" name="deadline"
                            class="w-full bg-[#0f172a] border-gray-700 rounded-2xl focus:border-cyan-500 focus:ring-cyan-500 text-white p-4 pl-12 appearance-none">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-400 mb-2 ml-1">Priorité</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fa-solid fa-layer-group"></i>
                        </span>
                        <select name="priority"
                            class="w-full bg-[#0f172a] border-gray-700 rounded-2xl focus:border-cyan-500 focus:ring-cyan-500 text-white p-4 pl-12 appearance-none cursor-pointer">
                            <option value="Basse">Basse</option>
                            <option value="Moyenne" selected>Moyenne</option>
                            <option value="Haute">Haute</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-cyan-500 hover:bg-cyan-400 text-[#0f172a] font-bold py-4 rounded-2xl transition-all duration-300 flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(6,182,212,0.3)] hover:shadow-[0_0_30px_rgba(6,182,212,0.5)] transform hover:-translate-y-1">
                    <i class="fa-solid fa-plus-circle"></i>
                    Créer la tâche
                </button>
            </div>
        </form>
    </div>
</div>
@endsection