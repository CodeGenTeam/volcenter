var app = angular.module('app')

.controller('adminEventsCtrl', function($scope, $http) {
	$scope.events = [{
		name:"Помощь пенсионерам",
		description:"", 
		place:"Челябинск, Юургу",
		dateStart:"15.04.16",
		dateEnd:"16.04.16",
		type:"Социальное волонтёрство",
		num: 10,
		numWait: 5,
		id: '1',
	}, {
		name:"Сдача крови",
		description:"", 
		place:"Юургу",
		dateStart:"13.04.16 12:00",
		dateEnd:"13.04.16 16:00",
		type:"Медицинское волонтерство",
		num: 40,
		numWait: 13,
		id: '2',
	}
	
	];

	$scope.eventsLast = [];
})