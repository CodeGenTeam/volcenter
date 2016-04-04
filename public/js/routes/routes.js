angular.module('app', ['ngRoute'])
    .config(function($routeProvider){
        $routeProvider.when('/createevent',
        {
            templateUrl:'views/createEvent.html',
            controller:'QuestionController'
        });
        $routeProvider.when('/answer',
        {
            templateUrl:'views/answer.html',
            controller:'AnswerController'
        });
});