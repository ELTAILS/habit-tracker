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
    <title>teste</title>
</head>
<body class="bg-[#FFEDD6]">

    <header class="bg-white border-t border-2 flex items-center justify-between p-4">
        <div>
            logo
        </div>

        <div>
            github
        </div>

    </header>
    <!--O conteudo das paginas vai para o $slot-->
    {{--Esse comentario não aparece no inspecionar--}}
        {{$slot}}
    <footer class="bg-white border-t border-2 text-center">
        <p>&reg; Criado por Wagner Junior, Lnk do repositorio <a href="https://github.com/ELTAILS/habit-tracker" target="_black" class="underline">GitHub</a></p>
    </footer>
</body>
</html>
