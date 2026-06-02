<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)] px-4">
        <x-navbar />

        @session('success')
            <br> <br>
            <div class="flex">
                <p class="bg-green-100 border border-gren-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{session('success')}}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-lg mt-8 mb-2">
                {{date('d/m/Y')}}
            </h2>
            <ul class="flex flex-col gap-2">
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
        </div>

    </main>
</x-layout>
