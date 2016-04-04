var app = angular.module('app')

.controller('userWatchCtrl', function($scope, $http, $anchorScroll) {
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
	}
	
})