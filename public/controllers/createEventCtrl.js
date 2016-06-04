var app = angular.module('app')

.controller('createEventCtrl', function($scope, $http, URL, $state) {

	$scope.event = {

	};

	$scope.eventsType = {
		options: [
			{id:'1',name:'Медицинское волонтёрство'},
			{id:'2',name:'Событийное волонтёрство'},
			{id:'3',name:'Социальное волонтёрство'},
			{id:'4',name:'Спортивное волонтёрство'},
			{id:'5',name:'Другое'}
			],
		    selected: {id:'5',name:'Другое'}
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
			$scope.event.type = $scope.eventsType.selected;

			console.log($scope.event);

			$.ajax({
				type: "POST",
				url: URL + '/event/create',
				data: $scope.event
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