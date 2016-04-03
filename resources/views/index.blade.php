@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Главная',
    'header'=> 'header-index',
))

@section('content')
    <div id="main-page-wrapper">
        <h1>Центр волонтеров Южного Урала</h1>
        <h3>Мы рады приветствовать вас</h3>

        <div id="comment">/* Сюда бы некоторое изображение */ </div>

        <h4>Хотите стать Волонтером? Вам следует пройти простую регистрацию,<br>
            чтобы всегда быть в курсе текущих мероприятий и активно принимать в них участие</h4>
        <div class="button button-color-2 href" id="bt-up"><a href="reg.html">Зарегистрироватсья</a></div>

        <h4 class="h4-mar-lit">Уже имеете учетную запись?</h4>
        <div class="button button-color-2 " id="bt-up">Войти</div>

        <div id="events-wrapepr" ng-controller="lastEventsCtrl">
            <h3>Ближайшие мероприятия</h3>

            <div class="main-page-event" ng-repeat="ev in events">
                <div class="circle"></div>

                <div class="event-name">@{{ev.name}}</div>

                <div class="event-dateStart event-dark">С: @{{ev.dateStart}}</div>
                <div class="event-dateEnd event-dark">По: @{{ev.dateEnd}}</div><br>
                <div class="event-type event-dark">@{{ev.type}}</div>
                <div class="event-place">@{{ev.place}}</div>

            </div>

        </div>


    </div>

    <script src="<?=asset('js/controllers/lastEventsCtrl.js')?>"></script>
@endsection
