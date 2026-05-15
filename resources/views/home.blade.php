<h1>Primeira Pagina com laravel</h1>

<p><strong>Meu nome é {{$nome}}, e esses são os meus hobbis</strong></p>

<ul>
    @foreach ($habits as $h)
        <li>{{$h}}</li>
    @endforeach
</ul>
