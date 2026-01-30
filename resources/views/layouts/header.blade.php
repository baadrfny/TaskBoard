<nav class="bg-[#0f172a] text-gray-300 py-4 px-8 flex justify-between items-center border-b border-gray-800">
    <div class="flex items-center gap-8">
        <h1 class="text-cyan-400 text-xl font-bold tracking-tight">TaskManager</h1>
        
        <div class="hidden md:flex items-center gap-6 text-sm font-medium">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-cyan-500 text-white px-4 py-2 rounded-full shadow-[0_0_15px_rgba(6,182,212,0.5)]' : 'hover:text-white transition' }} flex items-center gap-2">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a href="{{ route('tasks.index') }}" class="{{ request()->routeIs('tasks.index') ? 'bg-cyan-500 text-white px-4 py-2 rounded-full shadow-[0_0_15px_rgba(6,182,212,0.5)]' : 'hover:text-white transition' }} flex items-center gap-2">
                <i class="fas fa-tasks"></i> Mes Tâches
            </a>
            <a href="{{ route('tasks.create') }}" class="{{ request()->routeIs('tasks.create') ? 'bg-cyan-500 text-white px-4 py-2 rounded-full shadow-[0_0_15px_rgba(6,182,212,0.5)]' : 'hover:text-white transition' }} flex items-center gap-2">
                <i class="fas fa-plus-circle"></i> Nouvelle Tâche
            </a>
        </div>
    </div>

    <div class="flex items-center gap-6 text-sm">
        <span class="text-gray-400">{{ auth()->user()->email ?? 'guest@mail.com' }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 hover:text-red-400 transition">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </div>
</nav>