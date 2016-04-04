var app = angular.module('app')

.controller('settingsPersonCtrl', function ($scope) {
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
  
	$scope.checkData = function() {
	  
	}

	$scope.person = {
		email: '123@gmail.com',
		name1: 'Петр',
		name2: 'Горшков',
		name3: 'Алексеевич',
		password: '123456',
	}

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
	
	// languge
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
	}
	
	$scope.deleteLanguage = function(item, index) {
		$scope.languages.splice(index, 1);
	}
	
	//profile
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
	}
	
	$scope.deleteProfile = function(item, index) {
		$scope.profiles.splice(index, 1); 
	}
});
