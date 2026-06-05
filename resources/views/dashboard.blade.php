<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4 min-h-[80vh] w-full">
        <x-navbar />

        <div class="flex flex-col gap-4 items-start">
            <h2 class="text-lg mt-8 mb-2 font-bold">
                {{\Carbon\Carbon::now()->locale('pt_BR')->translatedFormat('l, d \d\e F')}}
            </h2>
            <ul class="flex flex-col gap-2 w-full">
                @forelse ($habits as $h)
                    <li class="habit-shadow-lg p-2 bg-[#ffdaac]">
                        <form method="POST"
                        action="{{route('habit.toggle', $h->id)}}"
                        class="flex gap-2 items-center"
                        id="form-{{$h->id}}"
                        >
                        @csrf
                            <input type="checkbox"
                            class="w-5 h-5" {{ $h->is_completed ? 'checked' : '' }}
                            {{$h->wasCompletedToday() ? 'checked' : '' }}
                            onchange="document.getElementById('form-{{$h->id}}').submit()"
                            >
                            <p class="font-bold text-lg">
                                {{$h->name}}
                            </p>
                        </form>
                    </li>
                @empty
                    <p>
                        <strong>ainda não tem hábito Cadastrado</strong>
                    </p>
                    <a href="{{route('habit.create')}}" class="bg-white p-2 border-2">
                        Cadastre um novo hábito agora
                    </a>
                @endforelse
            </ul>

            <a href="{{route('habit.create')}}" class="p-2 habit-shadow-lg bg-habit-orange habit-btn">
                Adicionar +
            </a>

        </div>

    </main>
</x-layout>
