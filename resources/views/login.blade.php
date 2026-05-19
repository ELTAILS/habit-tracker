<x-layout>
    <main class="py-10">
        <h1>faça login</h1>
        <section class="mt-4">
            <form action="/login" method="POST">
                @csrf
                <input type="email" name="email" placeholder="Seu email" class="bg-white p-2 border-2">
                <input type="password" name="password" placeholder="Sua senha" class="bg-white p-2 border-2">
                <button type="submit" class="bg-white p-2 border-2">Logar</button>
            </form>

            <div>
                @error('email')
                    <p class="text-red-500 text-xl mt-1">
                        Dados invalidos
                    </p>
                @enderror
            </div>

        </section>
    </main>
</x-layout>
