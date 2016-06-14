var app = angular.module('app')

.controller('mainCtrl', function($scope, $http, URL, $stateParams) {

    $scope.events = [];

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