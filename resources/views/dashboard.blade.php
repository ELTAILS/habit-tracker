<x-layout>
    <main class="py-10">
        <h1 class="text-3xl font-bold underline">Dashdoard</h1>
        @auth
            <p>
                Bem vindo(a), {{auth()->user()->name}}
            </p>
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
                        </div>
                        </li>
                    @empty
                        <p>
                            <strong>ainda não tem hábito Cadastrado</strong>
                        </p>
                        <a href="#" class="bg-white p-2 border-2">
                            Cadastre um novo hábito agora
                        </a>
                    @endforelse
                </ul>
            </div>
        @endauth
    </main>
</x-layout>
