<x-layout>
    <main class="py-10">
        <section class="bg-white max-w-150 mx-auto p-10 habit-shadow mt-4">
            <h1 class="font-bold text-3xl">faça login</h1>
            <p cl>Insira seus dados para acessar</p>

            <form action="{{route('auth.login')}}" method="POST" class="flex flex-col">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Seu email" class="bg-white p-2 habit-shadow @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-sm">
                        {{ $message}}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="password">Senha</label>
                    <input type="password" name="password" placeholder="Sua senha" class="bg-white p-2 habit-shadow @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-500 text-sm">
                        {{ $message}}
                    </p>
                    @enderror
                </div>
                <button type="submit" class="bg-habit-orange p-2 habit-shadow-lg"><strong>Logar</strong></button>
            </form>

            <p class="text-center mt-4">
                Ainda não tem uma conta? <a href="{{route('cadastrar')}}" class="underline hover:opacity-50 transition">Registre-se</a>
            </p>

        </section>
    </main>
</x-layout>
