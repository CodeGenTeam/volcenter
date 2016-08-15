<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- Для ajax csrf --}}
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <title>Волонтерский центр</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
              integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('/bin/css/fileinput.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/bin/css/notie.css') }}"/>
        <!-- Styles -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
              crossorigin="anonymous">
        {{-- <link href="{{ elixir('css/calendar.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://bootswatch.com/sandstone/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css"/>
        <link rel="stylesheet" href="{{ asset('/bin/css/flexslider.css') }}">
        <link rel="stylesheet" href="{{ asset('/bin/css/calendar.css') }}">
        <link rel="stylesheet" href="{{ asset('/bin/css/footer.css') }}">

        <script type="text/javascript" src="{{ asset('/bin/js/jQuery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/bin/js/simplePagination.js') }}"></script>
        <script src="{{ asset('/bin/js/app.js') }}"></script>
        <script type="text/javascript"
                src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

        <script type="text/javascript" src="{{ asset('/bin/js/jquery.flexslider-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/bin/js/fileinput.min.js') }}"></script>
        <style>
            body {
                font-family: 'Open Sans', sans-serif;
            }

            .fa-btn {
                margin-right: 6px;
            }
        </style>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Волонтерский центр
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">На главную</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/events') }}">Мероприятия</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/about') }}">Об организации</a></li>
                    </ul>
                    @if (\Admin::isModer() || \Admin::isAdmin())
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/adminpanel') }}">Админ-панель</a></li>
                        </ul>
                @endif
                <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Войти</a></li>
                            <li><a href="{{ url('/register') }}">Зарегистрироваться</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-cog"></i>Настройки</a>
                                    </li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Выйти</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        <footer>
            <p>&copy; CodeGenTeam. All rights reserved.</p>
        </footer>
        <script type="text/javascript" src="{{ url('/bin/js/notie.min.js') }}"></script>
    </body>
</html>
