var app = angular.module('app')

.controller('mainCtrl', function($scope, $http, URL, $stateParams) {

    $scope.events = [];

        // TODO test need to remove
	$scope.events = [{
		id: 1,
		name:"Помощь пенсионерам",
		description:"", 
		place:"Челябинск, Юургу",
		dateStart:"15.04.16",
		dateEnd:"16.04.16",
		type:"Социальное волонтёрство",
        descr: 'Over a dozen reusable components built to provide iconography, dropdowns, input groups, navigation, alerts, and much more. Glyphicons Available glyphs Includes over 250 glyphs in font format from the Glyphicon Halflings set. Glyphicons Halflings are normally not available for free, but their creator has made them available for Bootstrap free of cost. As a thank you, we only ask that you include a link back to Glyphicons whenever possible.',
	}, {
		id: 2,
		name:"Сдача крови",
		description:"", 
		place:"Юургу",
		dateStart:"13.04.16 12:00",
		dateEnd:"13.04.16 16:00",
		type:"Медицинское волонтерство",
	}
	
	];

	$http({
		method: 'GET',
		url: URL + '/event/last'
	}).then(function(response) {

		if (response.status == 200) {
            $scope.events = response.data;

		} else {

		}

	}, function(err) {
		console.log(err);
	});
});