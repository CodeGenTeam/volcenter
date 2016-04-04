var app = angular.module('app')

.controller('eventCtrl', function($scope, $http) {

	$scope.setState = function(state, user) {
		//$scope.users[index].state = state;
		user.state = state;
	};

	//$scope.sort()

	/*
	$scope.wait = [];
	$scope.reserve = [];
	$scope.confirmed = [];
	$scope.rejected = [];
*/
	
	$scope.users =[{
		id: '1123',
		name: 'Джон',
		img: new Image, // TODO загрузить
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

	
	$scope.ev =  {
		name: 'Сбор листвы',
		description:"", 
		place:"Челябинск, Юургу",
		dateStart:"15.04.16",
		dateEnd:"16.04.16",
		type:"Социальное волонтёрство",
		num: 3,
		numWait: 3,
		id: '1',
	}

})