@extends('admin_panel.layouts.main')
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
            <small>Так же вы всегда можете вернуться на <a href="/">главную страницу проекта</a></small>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Мероприятий</div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Всего</td>
                                <td>{{ App\Models\Event::count() }}</td>
                            </tr>
                            <tr>
                                <td>Прошло</td>
                                <td>{{ App\Models\Event::where('event_stop', '<=', \Carbon\Carbon::now())->count() }}</td>
                            </tr>
                            <tr>
                                <td>Предстоит</td>
                                <td>{{ App\Models\Event::where('event_start', '>', \Carbon\Carbon::now())->count() }}</td>
                            </tr>
                            <tr>
                                <td>Уже начаты</td>
                                <td>{{ App\Models\Event::where('event_start', '<=', \Carbon\Carbon::now())->where('event_stop', '>', \Carbon\Carbon::now())->count() }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection