@extends('layouts.app',  array(
    'title'=>'Центр волонтеров Южного Урала | Вход',
    'header'=> 'header-login'
))

@section('content')
    <div id="admin-wrapper">
        <h2>Вход</h2>

        <div id="events-wrapepr" ng-controller="loginCtrl" >
            <form class="form reg" name="form1" >
                <label>Логин</label>
                <input class="form-control input1" ng-model="user.name" name="login" required>

                <label>Пароль</label>
                <input type="password" class="form-control input1" ng-model="user.password" required>

                <input class="button button-color-2 input-button" type="submit"
                       ng-disabled="form1.$invalid" ng-click="checkData()">

            </form>
        </div>

    </div>
    <script src="<?=asset('js/controllers/loginCtrl.js')?>"></script>
@endsection
