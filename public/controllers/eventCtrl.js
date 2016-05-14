var app = angular.module('app')

.controller('eventCtrl', function($scope, $rootScope, $http, $stateParams, URL, eventRemoveService) {

		$scope.ev = {};

		$http({
			method: 'GET',
			url: URL + '/event/' + $stateParams.id
		}).then(function(response) {
			console.log(response);

			if (response.status == 200) {
				$scope.ev = response.data.event;
			}

		}, function(err) {
			console.log(err);
		});

		if ($rootScope.role == 'admin') {

			$scope.users = [];

			$scope.setState = function (state, user) {
				user.state = state;
			};

			$scope.removeEvent = function () {
				eventRemoveService($stateParams.id);
			}

		} else if ($rootScope.role == 'isloggedin') {
			$scope.go = function() {
				$http.get('/user')
					.success(function (data) {
						$scope.users = data;
					}).error(function (err) {

					});
			}
		}
/*
		$scope.ev = { // TODO Тест, удалить потом
			id: 1,
			name: 'Сдача крови',
			descr: 'Приглашаются все желающие!',
			type: 'Медицинское мероприятие',
			dateStart: '20.04.16',
			dateEnd: '20.04.16',
			address: 'Площадь Революции',
			motivations: [],
			responsibilities: []
		};*/
	
	$scope.users =[{ // TODO Тест, удалить потом
		id: '1123',
		name: 'Джон',
		img: new Image,
		state: 'wait' //'reserve', 'confirmed' 'rejected'
	}, {
		id: '3',
		name: 'Виталик',
		img: new Image,
		state: 'wait'
	},{
		id: '112d3',
		name: 'Игорь',
		img: new Image,
		state: 'wait'
	}, {
		id: '11223',
		name: 'Петя',
		img: new Image,
		state: 'wait'
	}

	];


});