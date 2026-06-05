<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)] px-4">
        <x-navbar />

        <h2 class="text-lg mt-8 mb-2 font-bold">
            Gerenciar Hábitos
        </h2>

        <h2 class="text-lg mt-8 mb-2">
            Configurar Hábitos
        </h2>

        <ul class="flex flex-col gap-2 mt-2">
            @forelse ($habits as $h)
                <li class="flex gap-2 items-center">
                    <div class="habit-shadow-lg p-2 bg-[#ffdaac] justify-between w-full">
                        <p class="font-bold text-lg">
                            {{$h->name}}
                        </p>
                    </div>
                    {{--Excluir--}}
                    <div class="flex gap-2">
                        <form action="{{route('habit.destroy', $h)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white habit-shadow-lg p-2 border-2 hover:opacity-50 ">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        {{--Editar--}}
                        <a href="{{route('habit.edit' , $h->id)}}" class="habit-shadow-lg bg-yellow-500 text-white p-2 border-2 hover:opacity-50">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </div>
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

    </main>
</x-layout>
