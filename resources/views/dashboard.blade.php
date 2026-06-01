<x-layout>
    <main class="py-10 min-h-[calc(100vh-108px)]">
        <h1 class="font-bold text-4xl text-center">
            Dashdoard
        </h1>

        <a href="{{route('habit.create')}}" class="p-2 border-2 bg-white font-bold">
            + Hábito
        </a>
        @session('success')
            <br> <br>
            <div class="flex">
                <p class="bg-green-100 border border-gren-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{session('success')}}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-xl mt-4">Listagem de Hábitos</h2>
            <ul class="flex flex-col gap-2">
                @forelse ($habits as $h)
                <li class="pl-4">
                    <div class="flex gap-2 items-center">
                        <p class="font-bold text-xl">
                            {{$h->name}}
                        </p>
                        <p>
                            ({{$h->habitLogs->count()}})
                        </p>
                        {{--Excluir--}}
                        <form action="{{route('habit.destroy', $h)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white p-1 border-2 hover:opacity-50">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        {{--Editar--}}
                        <a href="{{route('habit.edit' , $h->id)}}" class="bg-yellow-500 text-white p-1 border-2 hover:opacity-50">
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
        </div>

    </main>
</x-layout>
