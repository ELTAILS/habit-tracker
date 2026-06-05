<nav>
    <ul class="flex gap-4 items-center">
        <li>
            <a href="{{route('dashboard')}}" class="{{Route::is('dashboard') ? 'font-bold underline' : ''}} text-lg border-r-2 border-habit-orange pr-2">Hoje</a>
        </li>
        <li>
            <a href="{{route('habit.historico')}}" class="{{Route::is('habit.historico') ? 'font-bold underline' : ''}} text-lg border-r-2 border-habit-orange pr-2 hover:underline">Histórico</a>
        </li>
        <li>
            <a href="#" class="text-lg border-r-2 border-habit-orange pr-2 hover:underline">Calendario</a>
        </li>
        <li>
            <a href="{{route('habit.configurar')}}" class="{{Route::is('habit.configurar') ? 'font-bold underline' : ''}} text-lg border-r-2 border-habit-orange pr-2 hover:underline">Gerenciar Hábito</a>
        </li>
    </ul>
</nav>
