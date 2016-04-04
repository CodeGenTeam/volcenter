@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Создание мероприятия',
    'header'=> '',
))

@section('content')
    <div id="admin-wrapper">

        <h2>Создание события</h2>

        <div id="events-wrapepr" ng-controller="createEventCtrl">
            <form class="form form2" name="form1">
                <div class="lan-wrapper">
                    <label>Название проекта</label>
                    <input class="form-control" name="name" required>

                    <label>Место</label>
                    <input class="form-control margin-bot-not" name="place" required>
                </div>

                <div class="lan-wrapper">
                    <label>Начало мероприятия</label>
                    <div class="form-group">
                        <div class="col-xs-6 data-1">
                            <input type="date" class="form-control col-xs-2" >
                        </div>

                        <div class="col-xs-6 data-1">
                            <input type="time" class="form-control col-xs-2">
                        </div>
                    </div>


                    <label>Окончание меропрития</label>
                    <div class="form-group">
                        <div class="col-xs-6 data-1">
                            <input type="date" class="form-control col-xs-2">
                        </div>

                        <div class="col-xs-6 data-1">
                            <input type="time" class="form-control col-xs-2">
                        </div>
                    </div>
                </div>

                <div class="lan-wrapper">
                    <label>Тип мероприятия</label>
                    <select class="form-control margin-bot" ng-model="eventsType.selected" ng-options="o as o for o in eventsType.options"></select>

                    <label>Описание мероприятия </label>
                    <textarea class="form-control margin-bot-not"></textarea>
                </div>

                <h4><label>Стимулы и мотивация</label></h4>
                <div class="lan-wrapper">
                    <div class="button button-color-2 button-mar-none" ng-click="addMotivation()">Добавить стимул</div>

                    <div class="lan-obj" ng-repeat="motivate in motivations">

                        <label>Краткое описание</label>
                        <input class="form-control" value="@{{motivate.shortDescription}}">

                        <label>Полное описание</label>
                        <textarea class="form-control margin-bot-not" value="@{{motivate.fullDescription}}"></textarea>

                        <div class="event-delete icons" ng-click="deleteMotivation(pr, $index, $event)">
                            <img src="data/delete.png">
                        </div>
                    </div>
                </div>

                <h4><label>Направление</label></h4>

                <div class="lan-wrapper">
                    <div class="button button-color-2 button-mar-none" ng-click="addResp()">Добавить направление</div>

                    <div class="lan-obj" ng-repeat="res in responsibilities">
                        <label>Назвение позиции</label>
                        <input class="form-control input1" name="streets" value="@{{res.position}}">

                        <label>Описание задачи позиции</label>
                        <textarea class="form-control ">@{{res.task}}</textarea>

                        <label>Требуемое кол-во участников</label>
                        <input class="form-control input1 margin-bot-not" name="streets" value="@{{res.count}}">

                        <!--<div class="button" ng-click="deleteLanguage(lan, $index)">Удалить</div>-->
                        <div class="event-delete icons" ng-click="deleteResp(pr, $index, $event)">
                            <img src="data/delete.png">
                        </div>
                    </div>

                </div>

                <div class="lan-wrapper">
                    <label>Дополнительная информация</label>
                    <textarea class="form-control margin-bot-not"></textarea>
                </div>

                <input class="button button-color-2 input-button" type="submit" ng-click="checkData()">

            </form>

        </div>

    </div>

    <script src="<?=asset('js/controllers/createEventCtrl.js')?>"></script>
@endsection
