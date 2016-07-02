@extends('admin_panel.layout')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="text-primary">Вас приветствует панель администра проекта VolCenter</h2>
            <p class="lead">Выбирете одну из ссылок вверху страницы чтобы начать работать с панелью</p>
            <ul>
                @foreach(Admin::getLinks() as $link)
                    @if(isset($link['descr']))
                        <li><a href="/adminpanel/{{ $link['link'] }}"><b>{{ $link['name'] }}</b></a>
                            — {{ $link['descr'] }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
@endsection