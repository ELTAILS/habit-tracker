<x-layout>
    <main class="max-w-5xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold text-center">Veja Seus Hábitos ganharem vida</h1>
        @auth
            <p>
                Bem vindo(a), {{auth()->user()->name}}!
            </p>
        @endauth
    </main>
</x-layout>
