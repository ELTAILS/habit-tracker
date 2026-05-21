<x-layout>
    <main class="py-10">
        <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4">
            <h1 class="font-bold text-3x1">Registre-se</h1>
            <p cl>Preencha as informações para se cadastrar seus hábitos</p>
            <form action="{{route('auth.cadastrar')}}" method="POST" class="flex flex-col">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Seu Nome" class="bg-white p-2 border-2 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm">
                        {{ $message}}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Seu email" class="bg-white p-2 border-2 @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-500 text-sm">
                        {{ $message}}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="password">Senha</label>
                    <input type="password" name="password" placeholder="Sua senha" class="bg-white p-2 border-2 @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-500 text-sm">
                        {{ $message}}
                    </p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 mb-4">
                    <label for="password_confirmation">Confirmar sua senha</label>
                    <input type="password" name="password_confirmation" placeholder="Sua senha" class="bg-white p-2 border-2 @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-500 text-sm">
                        {{ $message}}
                    </p>
                    @enderror
                </div>
                <button type="submit" class="bg-white p-2 border-2">Cadastrar</button>
            </form>

            <p class="text-center mt-4">
                Já tem uma conta? <a href="{{route('login')}}" class="underline hover:opacity-50 transition">Logar</a>
            </p>

        </section>
    </main>
</x-layout>
