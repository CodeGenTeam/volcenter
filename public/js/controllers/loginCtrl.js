angular.module('app')

.controller('loginCtrl', function($scope, $http) {
	$scope.user = {
        name: '',
        password: ''
    };
	
	$scope.checkData = function() {
		if ( $scope.form1.$valid ) {

            $http.post( 'ajax.php', $scope.user )
			.success(function(data){
                if ( data.data == 'ok') {
                    $scope.user = {};
                    $scope.form1.$setPristine();
                    alert('Сообщение отправлено');
                } else {
                    alert('Возникла ошибка');
                }
            }).error(function(err){
                alert(err);
            });
			
        }
	};

})
