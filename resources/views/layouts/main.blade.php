<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Центр волонтеров Южного Урала</title>
    
    <link rel="stylesheet" href="user_panel_bin/css/bootstrap.min.css">
    <link rel="stylesheet" href="user_panel_bin/style.css">

    <script src="user_panel_bin/lib/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

    <script src="user_panel_bin/app.js"></script>

    <script src="user_panel_bin/controllers/mainCtrl.js"></script>
    <script src="user_panel_bin/controllers/eventsCtrl.js"></script>
    <script src="user_panel_bin/controllers/loginCtrl.js"></script>
    <script src="user_panel_bin/controllers/regCtrl.js"></script>
    <script src="user_panel_bin/controllers/settingsCtrl.js"></script>
    <script src="user_panel_bin/controllers/eventCtrl.js"></script>
    <script src="user_panel_bin/controllers/userCtrl.js"></script>
    
</head>
<body ng-app="app">

    <div id="header-title">
        <img src="user_panel_bin/images/brand.svg">
        <h4 class="title-head">Центр волонтеров Южного Урала</h4>
    </div>

    <header ng-controller="headerCtrl">
        <ul>
            <li><a href="/" id="header-main">На главную</a></li>
            <li><a href="/event/list" id="header-events">Мероприятия</a></li>

            <div>
                <li><a id="header-login">Войти</a></li>
                <li><a id="header-reg">Зарегистрироватсья</a></li>
            </div>

            <div>
                <li><a id="header-set">Настройки</a></li>
                <li><a>Выход</a></li>
            </div>

        </ul>
    </header>

    @yield('content')
    
    <div class="button" id="bt-up" ng-controller="scrollUpCtrl" ng-click="up($event);">Наверх</div>

    <footer>
        <div class="center">Разработанно name 2016</div>
    </footer>

</body>
</html>