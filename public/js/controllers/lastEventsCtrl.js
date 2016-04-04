angular.module('app')

.controller('lastEventsCtrl', function($scope, $http) {
	$scope.events = [{
		name:"Помощь пенсионерам",
		description:"", 
		place:"Челябинск, Юургу",
		dateStart:"15.04.16",
		dateEnd:"16.04.16",
		type:"Социальное волонтёрство",
	}, {
		name:"Сдача крови",
		description:"", 
		place:"Юургу",
		dateStart:"13.04.16 12:00",
		dateEnd:"13.04.16 16:00",
		type:"Медицинское волонтерство",
	}
	
	];



})