@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Настройки',
    'header'=> 'header-settings',
))

@section('content')
    <div id="events-wrapepr" ng-controller="settingsPersonCtrl" name="sampleForm">
        <form class="form reg">
            <h3> Основная информация</h3>
            <div class="lan-wrapper">
                <label>Почта</label>
                <input class="form-control input1" name="email" value="@{{person.email}}" required>

                <label>Имя</label>
                <input class="form-control input1" value="@{{person.name1}}" required>

                <label>Фамилия</label>
                <input class="form-control input1" value="@{{person.name2}}"required>

                <label>Отчество</label>
                <input class="form-control input1" value="@{{person.name3}}" required>

                <label>Пароль</label>
                <input type="password" class="form-control input1" value="@{{person.password}}" required>

                <label>Дата рождения</label>
                <div class="form-group ">
                    <div class="col-xs-4 data-1">
                        <select class=" margin-bot form-control" ng-model="dates.days.selected"
                                ng-options="o as o for o in dates.days.options"></select>
                    </div>

                    <div class="col-xs-4 data-1">
                        <select class=" margin-bot form-control" ng-model="dates.months.selected"
                                ng-options="o as o for o in dates.months.options"></select>
                    </div>

                    <div class="col-xs-4 data-1">
                        <select class=" margin-bot form-control" ng-model="dates.years.selected"
                                ng-options="o as o for o in dates.years.options"></select>
                    </div>
                </div>
            </div>

            <h3>Дополнительная информация</h3>

            <h4><label></label></h4>
            <div class="lan-wrapper">
                <label>Размер одежды</label>
                <select class="form-control" ng-model="clothes.selected" ng-options="o as o for o in clothes.options"></select>

                <label>Размер обуви</label>
                <input class="form-control input1" name="size_foot" value="@{{person.size_foot}}">
            </div>


            <h4><label>Адрес</label></h4>
            <div class="lan-wrapper">
                <label>Страна</label>
                <select class="form-control" ng-model="countries.selected" ng-options="o as o for o in countries.options"></select>

                <label>Город</label>
                <select class="form-control" ng-model="cities.selected" ng-options="o as o for o in cities.options"></select>

                <label>Улица</label>
                <input class="form-control input1" name="streets" value="@{{person.size_foot}}">

                <label>Номер дома</label>
                <input class="form-control input1" name="streets" value="@{{person.size_foot}}">

                <label>Дополнительно</label>
                <input class="form-control input1" name="streets" value="@{{person.size_foot}}">

                <label>Квартира</label>
                <input class="form-control input1" name="streets" value="@{{person.size_foot}}">
            </div>


            <h4><label>Учебное заведение</label></h4>
            <div class="lan-wrapper">
                <label>Название учебного заведения</label>
                <input class="form-control input1" name="streets" value="@{{person.size_foot}}">

                <label>Год начала обучения</label>
                <div class="form-group ">
                    <div class="col-xs-4 data-2">
                        <select class=" margin-bot form-control" ng-model="dates.years.selected"
                                ng-options="o as o for o in dates.years.options"></select>
                    </div>
                </div>

                <label>Год окончания обучения</label>
                <div class="form-group ">
                    <div class="col-xs-4 data-2">
                        <select class=" margin-bot form-control" ng-model="dates.years.selected"
                                ng-options="o as o for o in dates.years.options"></select>
                    </div>
                </div>

                <label>Факультет/группа | Класс</label>
                <input class="form-control input1" name="streets" value="@{{person.size_foot}}">
            </div>


            <h4><label>Языки</label></h4>

            <div class="lan-wrapper">
                <div class="button button-color-2 button-mar-none" ng-click="addLanguage()">Добавить язык</div>

                <div class="lan-obj" ng-repeat="lan in languages">
                    <label>Язык</label>
                    <input class="form-control input1" name="streets" value="@{{lan.name}}">

                    <label>Уровень владения</label>
                    <select class="form-control" ng-model="lan.level" ng-options="o as o for o in languagesSelect.options"></select>

                    <div class="event-delete icons" ng-click="$event.stopPropagation();$event.preventDefault();deleteLanguage(lan, $index)">
                        <img src="data/delete.png">
                    </div>
                </div>
            </div>

            <h4><label>Профили</label></h4>

            <div class="lan-wrapper">
                <div class="button button-color-2 button-mar-none" ng-click="addProfile()">Добавить профиль</div>

                <div class="lan-obj" ng-repeat="pr in profiles">
                    <label>Тип профиля</label>
                    <select class="form-control" ng-model="pr.type" ng-options="o as o for o in profilesSelect.options"></select>

                    <label>Данные</label>
                    <input class="form-control input1" name="streets" value="@{{pr.txt}}">

                    <!--<div class="button" ng-click="deleteLanguage(lan, $index)">Удалить</div>-->
                    <div class="event-delete icons" ng-click="$event.stopPropagation();$event.preventDefault(); deleteProfile(pr, $index)">
                        <img src="data/delete.png">
                    </div>
                </div>
            </div>

            <input class="button button-color-2 input-button" type="submit" ng-click="checkData()">

        </form>
        <div class="button ">Удалить аккаунт</div>
    </div>

    <script src="<?=asset('js/controllers/settingsPersonCtrl.js')?>"></script>
@endsection
