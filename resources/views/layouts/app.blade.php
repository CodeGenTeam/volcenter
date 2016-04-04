<!DOCTYPE html>
<html lang="en">
<head >

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title}}</title>

    <link rel="stylesheet" href="<?=asset('css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=asset('style.css')?>">

    <script src="<?=asset('js/lib/angular.min.js')?>"></script>
    <script src="<?=asset('js/app.js')?>"></script>

    <script src="<?=asset('js/lib/ui-bootstrap-1.2.5.min.js')?>"></script>
    <script src="<?=asset('js/controllers/scrollUp.js')?>"></script>

</head>
<body ng-app="app">

    <h4 class="title-head">Центр волонтеров Южного Урала</h4>

    <header>
        <ul>
            <li><a id="header-index" href="/" >На главную</a></li>
            <li><a id="header-events" href="{{ url('/events') }}">Мероприятия</a></li>
            <li><a href="/">О проекте</a></li>

            @if (Auth::guest())
                <li><a id="header-login" href="{{ url('/login') }}">Войти</a></li>
                <li><a id="header-reg" href="{{ url('/register') }}">Зарегистрироватсья</a></li>
            @else
                <li><a id="header-settings" href="{{ url('/settings') }}">Настройки</a></li>
                <li><a href="{{ url('/exit') }}">Выход</a></li>
            @endif
        </ul>
    </header>

    @yield('content')

    <div class="button" id="bt-up" ng-controller="scrollUpCtrl" ng-click="up($event);">Наверх</div>

    <footer>
        <div class="center">Разработанно name 2016</div>
    </footer>

    <script>
        if (document.getElementById('{{$header}}')) {
            document.getElementById('{{$header}}').className = 'current-header';
        }
    </script>


</body>
</html>
