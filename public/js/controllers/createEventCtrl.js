var app = angular.module('app')

.controller('createEventCtrl', function($scope, $http, $anchorScroll) {

		$scope.event = {
			name: '',
			description: '',
			dateStart: new Date(),
			dateEnd: new Date(),
		}

	$scope.eventsType = {
		options: ['Медицинское волонтёрство',
		'Событийное волонтёрство',
		'Социальное волонтёрство',
		'Спортивное волонтёрство',
		'Другое'],
		selected: 'Другое'
	};

	//responsibilities
	$scope.responsibilities = []

	$scope.addResp = function() {
		$scope.responsibilities.unshift({
		position: '',
		task: '',
		count: 5
		});
	};

	$scope.deleteResp = function(item, index) {
		$scope.responsibilities.splice(index, 1);
	};

	//motivations
	$scope.motivations = [];

	$scope.addMotivation = function() {
		$scope.motivations.unshift({
			shortDescription: '',
			fullDescription: '',
		});
	};

	$scope.deleteMotivation = function(item, index) {
		$scope.motivations.splice(index, 1);
	};

	$scope.date = new Date();


})