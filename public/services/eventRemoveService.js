var app = angular.module('app')

.factory('eventRemoveService', function ($http, $rootScope, $state, $uibModal, URL) {

		function remove(id, sc) {
			$http({
				method: 'DELETE',
				url: URL + '/event/' + id
			}).then(function(response) {
				console.log(response);

				if (response.data.success) {
					//$state.go('main');
					sc
				}

			}, function(err) {
				console.log(err);
			});
		}

		return function(id, sc) {
			var modalInstance = $uibModal.open({
				templateUrl: 'views/eventRemove.html',
				controller: function($scope) {
					$scope.close = function() {
						modalInstance.close();
					};

					$scope.ok = function() {
						modalInstance.close();
						remove(id, sc);
					}
				},
				size: 'sm',
				resolve: {
					hello: function() {
						return 123;
					}
				}
			});
		}
	})