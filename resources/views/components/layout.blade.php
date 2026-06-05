<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Creator: Wagner Da silva Junior">
    <!--font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--tailwindcss-->
    @vite('resources/css/app.css')
    <title>Habit-tracker</title>
</head>
<body class="bg-[#FFEDD6] relative habit-bg min-h-[calc(100vh-160px)] flex flex-col justify-between">

    <header class="bg-white border-t border-2 flex items-center justify-between p-4">
        <div class="flex items-center gap-2">
            <a href="{{route('index')}}" class="habit-btn habit-shadow-lg px-2 py-1 bg-habit-orange">HT</a>
            <p>Habiti Tracker</p>
        </div>

        <div class="flex gap-2 items-center">

            @auth
                <div class="flex gap-2">
                    <form action="{{route('auth.logout')}}" method="post">
                        <button type="submit" class="habit-btn p-2 habit-shadow-lg">
                            Sair
                        </button>
                    </form>

                    <a href="{{route('dashboard')}}" class="bg-habit-orange p-2 habit-shadow-lg">
                        <strong>Dashboard</strong>
                    </a>

                </div>
            @endauth

            @guest
                <div class="flex gap-2">
                    <a href="{{route('auth.cadastrar')}}" class="p-2 habit-shadow-lg"><strong>Cadastrar</strong></a>

                    <a href="{{route('login')}}" class="bg-habit-orange p-2 habit-shadow-lg"><strong>Login</strong></a>
                </div>
            @endguest

            <a href="https://github.com/ELTAILS/habit-tracker" class="habit-btn habit-shadow-lg p-1" target="_black"><i class="fa-brands fa-github text-3xl habit-color"></i></a>

        </div>

    </header>
    <!--O conteudo das paginas vai para o $slot-->
    {{--Esse comentario não aparece no inspecionar--}}
    <x-toast />
        {{$slot}}
        {{--Scripts--}}
        <script type="module" src="{{Vite::asset('resources/js/app.js')}}"></script>
    <footer class="bg-white border-t-2 p-4">
        <p class="text-center">&reg; Criado por
            <a href="https://www.linkedin.com/in/wagner-da-silva-junior/" target="_black" class="underline hover:text-habit-orange font-bold">Wagner Junior</a>,
            Link do repositorio
            <a href="https://github.com/ELTAILS/habit-tracker" target="_black" class="underline font-bold hover:text-habit-orange">GitHub</a>
        </p>
    </footer>
</body>
</html>
