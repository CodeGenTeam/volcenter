var app = angular.module('app')

.config(function($stateProvider, $urlRouterProvider){
	$stateProvider
	.state('app', {
		abstract: true,
		templateUrl: "views/main.html",
	})

	.state('main', {
		url: '/',
		templateUrl: 'views/main.html',
		controller:'mainCtrl',
		data: {

		}
	})

	.state('events', {
		url: '/events/:id',
		templateUrl: 'views/events.html',
		controller:'eventsCtrl',
		data: {

		}
	})

	.state('eventcreate', {
		url: '/eventcreate',
		templateUrl: 'views/createEvent.html',
		controller:'createEventCtrl',
		data: {
			permissions: {
				only: ['admin'],
				redirectTo: '/'
			}
		}
	})

	.state('login', {
		url: '/login',
		templateUrl: 'views/login.html',
		controller:'loginCtrl',
		data: {
			permissions: {
				only: ['anonymous'],
				redirectTo: 'main'
			}
		}
	})

	.state('reg', {
		url: '/reg',
		templateUrl: 'views/reg.html',
		controller:'regCtrl',
		data: {
			permissions: {
				only: ['anonymous'],
				redirectTo: 'main'
			}
		}
	})

	.state('settings', {
		url: '/settings',
		templateUrl: 'views/settings.html',
		controller:'settingsCtrl',
		data: {
			permissions: {
				except: ['anonymous'],
				redirectTo: 'main'
			}
		}
	})

	.state('event', {
		url: '/event/:id',
		templateUrl: 'views/event.html',
		controller:'eventCtrl',
		data: {

		}
	})

		.state('eventEdit', {
			url: '/eventedit/:id',
			templateUrl: 'views/editEvent.html',
			controller:'editEventCtrl',
			data: {

			}
		})

	.state('user', {
		url: '/user/:id',
		templateUrl: 'views/user.html',
		controller:'userCtrl',
		data: {

		}
	});
	$urlRouterProvider.otherwise('/');
});