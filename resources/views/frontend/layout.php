<!doctype html>
<html >
<head>
	<meta charset="utf-8">
	<title>Центр волонтеров Южного Урала</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">


	<script src="lib/jquery.min.js"></script>
	<script src="lib/angular.min.js"></script>
	<script src="lib/angular-route.js"></script>
	<script src="lib/angular-ui-router.min.js"></script>
	<script src="lib/angular-permission.js"></script>

	<script src="lib/ui-bootstrap-1.2.5.min.js"></script>

	<script src="app.js"></script>
	<script src="routes.js"></script>

	<script src="services/sessionService.js"></script>
	<script src="services/eventRemoveService.js"></script>

	<script src="controllers/mainCtrl.js"></script>
	<script src="controllers/eventsCtrl.js"></script>
	<script src="controllers/editEventCtrl.js"></script>
	<script src="controllers/createEventCtrl.js"></script>
	<script src="controllers/loginCtrl.js"></script>
	<script src="controllers/logoutCtrl.js"></script>
	<script src="controllers/regCtrl.js"></script>
	<script src="controllers/settingsCtrl.js"></script>
	<script src="controllers/eventCtrl.js"></script>
	<script src="controllers/userCtrl.js"></script>
	
</head>
<body ng-app="app">

	<div id="header-title">
		<img src="data/logo.svg">
		<h4 class="title-head">Центр волонтеров Южного Урала</h4>
	</div>

	<header ng-controller="headerCtrl">
		<ul>
			<li><a ui-sref="main" id="header-main" ng-click="change('#header-main')">На главную</a></li>
			<li><a ui-sref="events({id:1})" id="header-events" ng-click="change('#header-events')">Мероприятия</a></li>

			<div ng-if="role == 'anonymous'">
				<li><a ui-sref="login" id="header-login" ng-click="change('#header-login')">Войти</a></li>
				<li><a ui-sref="reg"  id="header-reg" ng-click="change('#header-reg')">Зарегистрироватсья</a></li>
			</div>

			<div ng-if="role != 'anonymous'">
				<li><a ui-sref="settings" id="header-set" ng-click="change('#header-set')">Настройки</a></li>
				<li><a ng-controller="logoutCtrl" ng-click="down()">Выход</a></li>
			</div>

		</ul>
	</header>

	<div ui-view=""></div>
	
	<div class="button" id="bt-up" ng-controller="scrollUpCtrl" ng-click="up($event);">Наверх</div>

    <footer>
        <div class="center">Разработанно name 2016</div>
    </footer>

</body>
</html>