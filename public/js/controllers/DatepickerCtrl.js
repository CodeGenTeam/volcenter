var app = angular.module('app')

.controller('DatepickerCtrl', function ($scope, $http) {

    $scope.dates = {
      days: {
          options: [],
          selected: 1
      },
      months: {
          options: [],
          selected: 1
      },
      years: {
          options: [],
          selected: 1990
      }
    };

    for (var i = 1; i < 32; ++i) {
      $scope.dates.days.options.push(i)
    }

    for (var i = 1; i < 13; ++i) {
        $scope.dates.months.options.push(i)
    }

    for (var i = 2016; i > 1950; --i) {
        $scope.dates.years.options.push(i)
    }

    $scope.user = {

    };

    $scope.checkData = function() {
        if ( $scope.form1.$valid ) {
            console.log($scope.user);
            $http.post( '/reg', $scope.user )
                .success(function(data){
                    if ( data.data == 'ok') {
                        $scope.user = {};
                        $scope.form1.$setPristine();
                        console.log('Сообщение отправлено');
                    } else {
                        console.log('Возникла ошибка');
                    }
                }).error(function(err){
                    //console.log(err);
                    document.body.innerHTML = err;
                    console.log(err)
                });

        }
    };
});