<x-layout>
    <main class="py-10">
        <h1 class="font-bold text-2xl text-center">
            Cadastrar novo habito
        </h1>

        <section class="habit-shadow-lg bg-white max-w-150 mx-auto p-10 mt-4 font-bold">
            <form action="{{route('habit.store')}}" method="post" class="flex flex-col">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">Novo Hábito</label>
                    <input type="text" name="name" placeholder="Beber agual" class="bg-white p-2 border-2 @error('name') border-red-500 @enderror">
                    @error('name')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <button type="submit" class="habit-shadow-lg p-2 bg-habit-orange">
                    Adicionar Hábito
                </button>
            </form>
        </section>

    </main>

</x-layout>
