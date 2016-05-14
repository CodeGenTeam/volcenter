angular.module('app')

.controller('loginCtrl', function($scope,  $http, SessionService, URL) {
	$scope.user = {
        email: '',
        password: ''
    };

    $scope.error = false;
    $scope.errorTxt = '';

    function success(data) {
        SessionService.login(data);
    }
	
	$scope.checkData = function() {
		if ( $scope.form1.$valid ) {
            $http({
                method: 'GET',
                url: URL + '/user/login',
                params:  $scope.user
            }).then(function(response) {

                var data = response.data;
                console.log(response);

                if (data.success) {
                    $scope.error = false;
                    success(data);
                } else {
                    $scope.error = true;
                    $scope.errorTxt = 'Error: ' + data.error;
                }
            }, function(err) {
                console.log(err);
            });

        }
	};

})
