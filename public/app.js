var app = angular.module('app', ['ui.bootstrap', 'ngRoute', 'ui.router', 'permission'])

.factory('URL', function(){
	return 'http://localhost';
	// return 'http://api.volcenter:8080';
	// return 'http://alexphost.ru:8080';
})

.run(function($rootScope, Permission, SessionService, $http) {

	SessionService.init();

	Permission
	.defineRole('anonymous', function (stateParams) {
		if ($rootScope.role == 'anonymous') {
			return true;
		};
		return false;
	})

	.defineRole('isloggedin', function (stateParams) {
		if ($rootScope.role == 'isloggedin') {
			return true;
		}
		return false;
	})

	.defineRole('admin', function (stateParams) {
		if ($rootScope.role == 'admin') {
			return true;
		}
		return false;
	});
})


.controller('headerCtrl', function($scope, $rootScope) {

	$scope.change = function(id) {
		if ($rootScope.headElem) {
			$rootScope.headElem.className = '';
		}
		$rootScope.headElem = document.querySelector(id);
		$rootScope.headElem.className  = 'current-header';
	};
})

.controller('scrollUpCtrl', function($scope) {

	var isMoved = false;

	$scope.up = function(e) {
		e.stopPropagation();
		e.preventDefault();

		if (isMoved) return;

		isMoved = true;
		var dy = -100,
			dt = 17,
			vel = window.pageYOffset || document.documentElement.scrollTop;

		document.body.style.cursor = 'default';

		var timer = setInterval(function(){

			if (vel + dy <= 0) {
				window.scrollTo(0, 0);
				isMoved = false;
				clearInterval(timer);
			} else {
				vel += dy;
				window.scrollTo(0, vel);
			};

		}, dt);

	}
})

