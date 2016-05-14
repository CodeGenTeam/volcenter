var app = angular.module('app')

.factory('SessionService', function ($http, $rootScope, $state) {
	var service = {};

	service.init = function() {
		var session = JSON.parse(localStorage.getItem('user'));

		if (!session || !session.role) {
			session = {
				id: '',
				sesId: '',
				role: 'anonymous'
			};
			localStorage.setItem('user', JSON.stringify(session));
		}

		$rootScope.role =  session.role;
		$rootScope.userID =  session.id;

		$rootScope.$on('$stateChangeStart', function (event, next) {

		})
	};

	service.login = function(data) {

		// TODO убрать, получатт с сервера
		data.role = 'admin';
		//data.role: 'isloggedin'

		localStorage.setItem('user', JSON.stringify(data));

		$rootScope.role =  data.role;
		$rootScope.userID =  data.id;

		$state.go('main');
	};

	service.logout = function() {
		var data = {
			id: '',
			sesId: '',
			role: 'anonymous'
		};
		localStorage.setItem('user', JSON.stringify(data));

		$rootScope.role =  data.role;
		$rootScope.userID =  data.id;
		$state.go('main');
	};


	return service;
})