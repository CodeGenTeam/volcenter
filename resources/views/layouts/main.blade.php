<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Панель управления</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.webix.com/edge/webix.css" type="text/css">
    <link href="app.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="http://cdn.webix.com/edge/webix.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/vue/latest/vue.js"></script>

    <script>
        $(function(){
            $(window).ready(function () {
                var win = $(this); //this = window
                if (win.width() <= 768) {
                    $('.big-logo').html('');
                } else if (win.width() > 768) {
                    $('.big-logo').html('<a class="navbar-brand" href="#"><img src="/brand.svg" /></a>');
                }
            });
            $(window).resize(function(){
                var win = $(this); //this = window
                if (win.width() <= 768) {
                    $('.big-logo').html('');
                } else if (win.width() > 768) {
                    $('.big-logo').html('<a class="navbar-brand" href="#"><img src="/brand.svg" /></a>');
                }
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <a class="navbar-brand small-logo" href="#"><img src="/brand.svg" /></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="big-logo"></li>
                <li class="active"><a href="#">Главная страница</a></li>
                <li><a href="#">Мероприятия</a></li>
                <li><a href="#">Контакты</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Личный кабинет<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Профиль</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Настройки</a></li>
                        <li><a href="#">Выйти</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>

@yield('content')

<div id="footer" class="center navbar-default">
    <div class="container">Карта сайта, либо еще что-то интересное.</div>
</div>
</body>
</html>