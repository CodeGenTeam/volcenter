angular.module('app')

.controller('logoutCtrl', function($scope,  $http , SessionService, URL, $rootScope) {

    function success() {
        SessionService.logout();
    }
	
	$scope.down = function() {
        console.log($rootScope.userID)
        $http({
            method: 'GET',
            url: URL + '/user/logout',
            params: $rootScope.userID
        }).then(function(response) {

            var data = response.data;
            console.log(data);

            if (data.success) {
                success(data);
            } else {
                console.log('Error: ' + data.error);
                //success(); // TODO убрать
            }
        }, function(err) {
            console.log(err);
            //success();
        });
	};

});
