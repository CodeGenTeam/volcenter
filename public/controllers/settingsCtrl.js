var app = angular.module('app')

.controller('settingsCtrl', function ($scope, $rootScope, $http, URL, SessionService) {

		//profiles_types
		//profiles
		//language_level
		//languages
		//study
		//study_university

		// Парсим дату, полученную с сервера
		function parseDate(user) {
			var data = user.birthday;

			user.year = data.slice(0, 4);
			user.month = data.slice(5, 7);
			user.day = data.slice(8, 10);

		}

		// Объединяем переменне даты для отправки на сервер
		function joinData() {
			var u = $scope.user;
			u.birthday =  [u.year, u.month, u.day].join('-');
		}

		// Запросы за данными юзера
		function getDataFromServer() {

			// main data
			$http({
				method: 'GET',
				url: URL + '/user/' + $rootScope.userID,
				params: $scope.user
			}).then(function (response) {

				var data = response.data;
				console.log('Main data\n', data);

				if (data.success) {
					$scope.error = false;

					// Парсим дату
					parseDate(data.user);
					$scope.user = data.user;

				} else {
					$scope.error = true;
					$scope.errorTxt = 'Error: ' + data.error;
				}

			}, function (err) {
				$scope.error = true;
				$scope.errorTxt = 'Ошибка запроса на сервер';
			});

			/*
			//clothes
			 $http({
			 	method: 'GET',
			 	url: URL + '/user/' + '' // TODO забираем одежду
			 }).then(function (response) {

				var data = response.data;
				console.log('Одежда\n', data);

			 if (data.success) {
				 $scope.error = false;

				 $scope.user.size_clothes = data.size_clothes;
				 $scope.user.size_foot = data.size_foot;

			 } else {
				 $scope.error = true;
				 $scope.errorTxt = 'Error: ' + data.error;
			 }

			 }, function (err) {
				 $scope.error = true;
				 $scope.errorTxt = 'Ошибка запроса на сервер';
			 });

			//addresses
			$http({
				method: 'GET',
				url: URL + '/user/' + ''// TODO забираем адрес
			}).then(function (response) {

				var data = response.data;
				console.log('Адрес\n', data);

				if (data.success) {
					$scope.error = false;

					$scope.user.country = data.country;
					$scope.user.city = data.city;
					$scope.user.street = data.street;
					$scope.user.house = data.house;
					$scope.user.ext = data.ext;
					$scope.user.flat = data.flat;

				} else {
					$scope.error = true;
					$scope.errorTxt = 'Error: ' + data.error;
				}

			}, function (err) {
				$scope.error = true;
				$scope.errorTxt = 'Ошибка запроса на сервер';
			});
			 */
		}

		$scope.deleteUser = function() {
			$http({
				method: 'DELETE',
				url: URL + '/user/' + $rootScope.userID,
			}).then(function (response) {

				var data = response.data;

				if (data.success) {
					$scope.error = false;
					$scope.user = data.user;

					SessionService.logout();

				} else {
					$scope.error = true;
					$scope.errorTxt = 'Error: ' + data.error;
				}

			}, function (err) {
				$scope.error = true;
				$scope.errorTxt = 'Ошибка запроса на сервер';
			});
		};

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

		function initAddInfo() {
			$scope.clothes = {
				options: ['Не указано', 'XXS', 'XS','XL'],
				selected: 'Не указано'
			};

			$scope.countries = {
				options: ['Не указано', 'Россия', 'Китай','Казахстан'],
				selected: 'Не указано'
			};

			$scope.cities = {
				options: ['Не указано', 'Челябинск', 'Златоуст','Миасс'],
				selected: 'Не указано'
			};
		}

		function initLanguages() {
			$scope.languagesSelect = {
				options: [
					'Beginner',
					'Pre-Intermediate',
					'Intermediate',
					'Upper-Intermediate',
					'Advanced',
					'Proficiency'
				],
				selected: 'Intermediate'
			};

			$scope.languages = [];

			$scope.addLanguage = function() {
				$scope.languages.unshift({
					name: '',
					level: 'Intermediate',
				});
			};

			$scope.deleteLanguage = function(item, index) {
				$scope.languages.splice(index, 1);
			}
		}


		function initProfiles() {
			$scope.profilesSelect = {
				options: ['Телефон', 'VK', 'Facebook', 'Skype', 'Другое'],
				selected: 'Телефон'
			};

			$scope.profiles = [];

			$scope.addProfile = function() {
				$scope.profiles.unshift({
					type: 'Другое',
					txt: '911',
				});
			};

			$scope.deleteProfile = function(item, index) {
				$scope.profiles.splice(index, 1);
			}
		}

		$scope.user = {};
		getDataFromServer();
		setDate();
		initAddInfo();
		initLanguages();
		initProfiles();

		$scope.checkData = function() {
			if ( $scope.form1.$valid ) {

				joinData();

				console.log($scope.user);

				$http({
					method: 'PUT',
					url: URL + '/user/'  + $rootScope.userID,
					params: $scope.user,
				}).then(function(response) {
					var data = response.data;
					console.log(response);

					if (data.success) {
						$scope.error = false;
						$scope.success = true;
						$scope.flash = 'Настройки успешно сохранены!';

					} else {
						$scope.error = true;
						$scope.errorTxt = 'Error: ' + data.error;
					}
				}, function(err) {
					console.log(err);
				});
			}
		};
});
