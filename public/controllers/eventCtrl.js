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
				$scope.ev.event_start = Date.parse($scope.ev.event_start);
				$scope.ev.event_end = Date.parse($scope.ev.event_end);
				if ($scope.ev.image !== null && $scope.ev.image !== undefined && $scope.ev.image !== '') {
					$scope.ev.image = 'images/events/' + $scope.ev.image;
				}
			}

		}, function(err) {
			console.log(err);
		});

		if ($rootScope.role == 'isloggedin') {
			$scope.go = function() {
				$http.get('/user')
					.success(function (data) {
						$scope.users = data;
					}).error(function (err) {

					});
			}
		}
});