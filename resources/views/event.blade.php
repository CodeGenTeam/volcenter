@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Главная',
    'header'=> ''
))

@section('content')
    <div id="admin-wrapper" ng-controller="eventCtrl">


        <h2 class="h2-big">Мероприятие '@{{ev.name}}'</h2>

        <div id="events-wrapepr" >
            <div class="main-page-event admin-page-event" >

                <a  href="/event/@{{ev.id}}" >
                    <div class="event-name">@{{ev.name}}</div>

                    <div class="event-dateStart event-dark">С: @{{ev.dateStart}}</div>
                    <div class="event-dateEnd event-dark">По: @{{ev.dateEnd}}</div><br>
                    <div class="event-type event-dark">@{{ev.type}}</div>
                    <div class="event-place">@{{ev.place}}</div>

                    <div class="event-nums">
                        <div class="event-num">Подтверждено участников: @{{participant.length}}</div>
                        <div class="event-numWait">Ожидает подтверждения: @{{participantNot.length}}</div>
                    </div>

                    <div class="event-delete icons" ng-click="$event.stopPropagation();$event.preventDefault();">
                        <img src="<?=asset('data/delete.png')?>">
                    </div>

                    <div class="event-edit icons" ng-click="$event.stopPropagation();$event.preventDefault();"
                         uib-popover="I appeared on mouse enter!" popover-trigger="mouseenter">
                        <img src="<?=asset('data/edit.png')?>">
                    </div>
                </a>

            </div>

            <div class="event-users-wrapper">
                <h3>Ожидающие подтверждения (@{{wait.length}})</h3>
                <div class="person" ng-repeat="user in users | filter:{state: 'wait'} as wait">

                    <a  href="/user/@{{user.id}}" >
                        <div class="person-name">@{{user.name}}</div>
                    </a>

                    <div class="person-add" ng-click="setState('confirmed', user)"
                         uib-popover="Подтвердить участника" popover-trigger="mouseenter" popover-append-to-body="true">+</div>

                    <div class="person-res" ng-click="setState('reserve', user)"
                         uib-popover="Добавить в резерв" popover-trigger="mouseenter" popover-append-to-body="true">R</div>

                    <div class="person-remove" ng-click="setState('rejected', user)"
                         uib-popover="Отклонить участника" popover-trigger="mouseenter" popover-append-to-body="true">-</div>
                </div>
            </div>

            <div class="event-users-wrapper">
                <h3>Подтвержденные участники(@{{confirmed.length}})</h3>
                <div class="person" ng-repeat="user in users | filter:{state: 'confirmed'} as confirmed">

                    <a  href="/user/@{{user.id}}" >
                        <div class="person-name">@{{user.name}}</div>
                    </a>

                    <div class="person-res" ng-click="setState('reserve', user)"
                         uib-popover="Добавить в резерв" popover-trigger="mouseenter" popover-append-to-body="true">R</div>

                    <div class="person-remove" ng-click="setState('rejected', user)"
                         uib-popover="Отклонить участника" popover-trigger="mouseenter" popover-append-to-body="true">-</div>
                </div>
            </div>

            <div class="event-users-wrapper">
                <h3>Резервные участники(@{{reserve.length}})</h3>
                <div class="person" ng-repeat="user in users | filter:{state: 'reserve'} as reserve">
                    <a  href="/user/@{{user.id}}" >
                        <div class="person-name">@{{user.name}}</div>
                    </a>

                    <div class="person-add" ng-click="setState('confirmed', user)"
                         uib-popover="Подтвердить участника" popover-trigger="mouseenter" popover-append-to-body="true">+</div>

                    <div class="person-remove" ng-click="setState('rejected', user)"
                         uib-popover="Отклонить участника" popover-trigger="mouseenter" popover-append-to-body="true">-</div>
                </div>
            </div>

            <div class="event-users-wrapper">
                <h3>Отклоненные участники(@{{rejected.length}})</h3>
                <div class="person" ng-repeat="user in users | filter:{state: 'rejected'} as rejected">
                    <a  href="/user/@{{user.id}}" >
                        <div class="person-name">@{{user.name}}</div>
                    </a>

                    <div class="person-add" ng-click="setState('confirmed', user)"
                         uib-popover="Подтвердить участника" popover-trigger="mouseenter" popover-append-to-body="true">+</div>

                    <div class="person-res" ng-click="setState('reserve', user)"
                         uib-popover="Добавить в резерв" popover-trigger="mouseenter" popover-append-to-body="true">R</div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?=asset('js/controllers/eventCtrl.js')?>"></script>
@endsection
