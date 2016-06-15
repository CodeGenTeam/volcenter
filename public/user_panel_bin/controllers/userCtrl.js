var app = angular.module('app')

.controller('userCtrl', function($scope, $http, $stateParams, URL ) {
	$scope.user = {
		name1: 'Сергей',
		name2: 'Кузнецов',
		name3: 'Андреевич',
		email: 'slon.serg.k@gmail.com',
		birthday: '',
		
		Addreses: {
			country: 'Россия',
			city: 'Челябинск',
			street: '',
			house: '',
			ext: '',
			flat: '',
		},
		
		Study: {
			
		},
		
		profiles: [{
			type: 'VK',
			link: 'http://vk.com/serg_kyz'
		},{
			type: 'Телефон',
			link: '89123'
		}]
	};

    $http({
        method: 'GET',
        url: URL + '/user/'+ $stateParams.id,
    }).then(function(response) {
        var data = response.data;
        console.log(response);

        if (data.success) {
            $scope.error = false;
            $scope.user = data.user;

        } else {
            $scope.error = true;
            $scope.errorTxt = 'Error: ' + data.error;
        }

    }, function(err) {
        console.log(err);
    });

})