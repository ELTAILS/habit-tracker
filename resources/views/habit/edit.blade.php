<x-layout>
    <main class="py-10">
        <h1 class="font-bold text-2xl text-center">
            Editar hábito
        </h1>

        <section class="habit-shadow-lg bg-white max-w-150 mx-auto p-10 mt-4 font-bold">
            <form action="{{route('habit.update', $habit->id)}}" method="POST" class="flex flex-col">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">Editar Hábito</label>
                    <input type="text" name="name" placeholder="Beber agual" class="bg-white p-2 border-2 @error('name') border-red-500 @enderror" value="{{$habit->name}}">
                    @error('name')
                    <p class="text-red-500 text-sm">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <button type="submit" class="habit-shadow-lg p-2 bg-habit-orange">
                    Editar Hábito
                </button>
            </form>
        </section>

    </main>

</x-layout>
