var app = angular.module('app')

.controller('regCtrl', function ($scope, $http, URL, SessionService) {

        //Выбор даты рождения
    function setDate() {
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

    }

    // Преобразовать дату в строку
    function resetDate() {
        var d = $scope.dates;
        $scope.user.date = [d.days.selected, d.months.selected, d.years.selected].join('.');
    }

    setDate();
    $scope.user = {};
    $scope.request = false;

    // Для показа ошибки с сервера, если будет
    $scope.error = false;
    $scope.errorTxt = '';

    // Немного валидации
    $scope.checkData = function() {

        if ($scope.request) {
            return;
        }

        if ( $scope.form1.$valid ) {

            $scope.request = true;

            resetDate();

            $scope.user.action = 'register';
            console.log('create');
            $http({
                method: 'GET',
                url: URL + '/user/create',
                params:  $scope.user
            }).then(function(response) {
                var data = response.data;
                console.log(response);

                if (data.success) {
                    $scope.error = false;
                    SessionService.login(data);

                    //window.location.href= '/';
                } else {
                    $scope.error = true;
                    $scope.errorTxt = 'Ошибка: ' + data.error;
                }

                $scope.request = false;

            }, function(err) {
                console.log(err);

                $scope.error = true;
                $scope.errorTxt = 'Ошибка запроса на сервер';
                $scope.request = false;
            });

        }
    };
});