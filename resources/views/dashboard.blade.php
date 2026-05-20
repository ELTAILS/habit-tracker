<x-layout>
    <main class="py-10">
        <h1 class="text-3xl font-bold underline">Dashdoard</h1>
        @auth
            <p>
                Bem vindo(a), {{auth()->user()->name}}!
            </p>
        @endauth
    </main>
</x-layout>
