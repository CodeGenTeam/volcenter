var app = angular.module('app', [])

.factory('URL', function(){
	return '';
	// return 'http://api.volcenter:8080';
	// return 'http://alexphost.ru:8080';
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