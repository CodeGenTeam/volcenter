var app = angular.module('app')

.controller('eventsCtrl', function($scope, $rootScope, $http, eventRemoveService, URL, $stateParams) {

		$scope.load = true;

	$scope.removeEvent = function (id, index, e) {

		e.stopPropagation();
		e.preventDefault();
		if (id) {
			var flag = eventRemoveService(id);
			if (flag) {
				$scope.events.splice(index, 1);
			}
		}
	};

	$http({
		method: 'GET',
		url: URL + '/event/list/' + $stateParams.id
	}).then(function(response) {
		console.log(response);

		if (response.status == 200) {
			$scope.load = false;
			$scope.events = response.data;
		}

	}, function(err) {
		console.log(err);
	});
});