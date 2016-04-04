@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Регистрация',
    'header'=> 'header-reg'
))

@section('content')
    <div id="admin-wrapper">
        <h2>Регистрация</h2>

        <div id="events-wrapepr" ng-controller="DatepickerCtrl">
            <form class="form reg" name="form1">

                <div ng-class="{ 'has-error' : form1.login.$invalid && !form1.login.$pristine }">
                    <label>Логин</label>
                    <input class="form-control input1" ng-model="user.login" name="login"
                           ng-minlength="3" ng-maxlength="15" required >
                    <p ng-show="form1.login.$error.minlength" class="help-block">Имя слишком короткое</p>
                    <p ng-show="form1.login.$error.maxlength" class="help-block">Имя слишком длинное</p>
                </div>

                <div ng-class="{ 'has-error' : form1.email.$invalid && !form1.email.$pristine }">
                    <label>Почта</label>
                    <input class="form-control input1" type="email"
                           name="email" ng-model="user.email" >
                    <p ng-show="form1.email.$invalid && !form1.email.$pristine"
                       class="help-block">Введите корректный email</p>
                </div>

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
                <!--
                <div class="form-group">
                    <input type="date" class="form-control col-xs-2" ng-model="user.data">
                </div>-->

                <label>Телефон</label>
                <input class="form-control input1" type="tel" ng-model="user.mobile" required>

                <label>Имя</label>
                <input class="form-control input1" ng-model="user.name1" required>

                <label>Фамилия</label>
                <input class="form-control input1" ng-model="user.name2" required>

                <label>Отчество</label>
                <input class="form-control input1" ng-model="user.name3" required>

                <label>Придумайте пароль</label>
                <input type="password" class="form-control input1" ng-model="user.password"
                       name="password" ng-minlength="7"  required>
                <p ng-show="form1.password.$error.minlength" class="help-block">Пароль слишком короткий</p>

                <input class="button button-color-2 input-button" type="submit"
                       ng-click="checkData()" ng-disabled="form1.$invalid">

            </form>
        </div>

    </div>
    <script src="<?=asset('js/controllers/DatepickerCtrl.js')?>"></script>
    <script src="<?=asset('js/lib/angular-animate.js')?>"></script>
@endsection
