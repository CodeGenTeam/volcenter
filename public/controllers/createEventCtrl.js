var app = angular.module('app')

.controller('createEventCtrl', function($scope, $http, URL, $state) {

	$scope.event = {

	};

	$scope.eventsType = {
		options: ['Медицинское волонтёрство',
		'Событийное волонтёрство',
		'Социальное волонтёрство',
		'Спортивное волонтёрство',
		'Другое'],
		selected: 'Другое'
	};

	//responsibilities
	$scope.responsibilities = [];

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
	$scope.error = false;
	$scope.errorTxt = '';


	$scope.checkData =function() {
		if ( $scope.form1.$valid ) {


			$scope.event.motivations = $scope.motivations;
			$scope.event.responsibilities = $scope.responsibilities;
			$scope.event.type = 1//$scope.eventsType.selected;

			console.log($scope.event);

			$http({
				method: 'POST',
				url: URL + '/event/create',
				params: $scope.event
			}).then(function(response) {

				var data = response.data;
				console.log(data);

				if (data.success) {
					$scope.error = false;

					$state.go('events',{id: 1});
				} else {
					$scope.error = true;
					$scope.errorTxt = 'Error: ' + data.error;
				}
			}, function(err) {
				console.log(err);
				//document.body.innerHTML = err.data;
			});

		}
	}
})