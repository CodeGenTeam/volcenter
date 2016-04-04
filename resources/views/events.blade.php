@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Мероприятия',
    'header'=> 'header-events',
))

@section('content')
    <div id="admin-wrapper">

        <h2>Мероприятия</h2>

        <div class="bordered">
            <h4 class="h4-mar-lit">Создать новое мероприятие</h4>
            <div class="button button-color-2 href" id="bt-up"><a href="{{url('/eventcreate')}}">Создать</a></div>
        </div>

        <div id="events-wrapepr" ng-controller="adminEventsCtrl">
            <h3>Мероприятия, которые скоро пройдут</h3>

            <div class="main-page-event admin-page-event" ng-repeat="ev in events">

                <a href="event/@{{ev.id}}" >
                    <div class="event-name">@{{ev.name}}</div>

                    <div class="event-dateStart event-dark">С: @{{ev.dateStart}}</div>
                    <div class="event-dateEnd event-dark">По: @{{ev.dateEnd}}</div><br>
                    <div class="event-type event-dark">@{{ev.type}}</div>
                    <div class="event-place">@{{ev.place}}</div>

                    <div class="event-nums">
                        <div class="event-num">Подтверждено участников: @{{ev.num}}</div>
                        <div class="event-numWait">Ожидает подтверждения: @{{ev.numWait}}</div>
                    </div>

                    <div class="event-delete icons" ng-click="$event.stopPropagation();$event.preventDefault();"
                         uib-popover="Удалить" popover-trigger="mouseenter" popover-append-to-body="true">
                        <img src="<?=asset('data/delete.png')?>">
                    </div>

                    <div class="event-edit icons" ng-click="$event.stopPropagation();$event.preventDefault();"
                         uib-popover="Редактировать" popover-trigger="mouseenter" popover-append-to-body="true">
                        <img src="<?=asset('data/edit.png')?>">
                    </div>

                </a>
            </div>

            <h3 ng-show="eventsLast.length != 0">Прошедшие мероприятия</h3>

            <div class="main-page-event admin-page-event" ng-repeat="ev in eventsLast">

                <a  href="@{{ev.id}}.html" >
                    <div class="event-name">@{{ev.name}}</div>

                    <div class="event-dateStart event-dark">С: @{{ev.dateStart}}</div>
                    <div class="event-dateEnd event-dark">По: @{{ev.dateEnd}}</div><br>
                    <div class="event-type event-dark">@{{ev.type}}</div>
                    <div class="event-place">@{{ev.place}}</div>
                </a>
            </div>

        </div>
    </div>


    <script src="<?=asset('js/controllers/adminEventsCtrl.js')?>"></script>
@endsection
