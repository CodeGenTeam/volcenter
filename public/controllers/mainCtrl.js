var app = angular.module('app')

.controller('mainCtrl', function($scope, $http, URL, $stateParams) {

    $scope.events = [];

	$http({
		method: 'GET',
		url: URL + '/event/last'
	}).then(function(response) {

		if (response.status == 200) {
            $scope.events = response.data;
            console.log($scope.events);
            angular.forEach($scope.events, function(options) {
	 			angular.forEach(options, function(value, option) {
		   			if (option == "image") {
		   				if (value !== null && value !== undefined && value !== '') {
							options[option] = "images/events/" + value;
						}
		   			} 
 				});
 			});

		} else {

		}

	}, function(err) {
		console.log(err);
	});
});