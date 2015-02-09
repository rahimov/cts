'use strict';
/* App Module */
var catApp = angular.module('catApp', [
    'ngRoute',
    'catControllers',
    'catServices',
    'photoServices'
]);
catApp.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/cats', {
                templateUrl: 'views/cat-list.html',
                controller: 'CatListCtrl'
            }).
            when('/cats/:catId', {
                templateUrl: 'views/cat-detail.html',
                controller: 'CatDetailCtrl'
            }).
            when('/cats/:catId/edit', {
                templateUrl: 'views/cat-edit.html',
                controller: 'CatEditCtrl'
            }).
            otherwise({
                redirectTo: '/cats'
            });
    }]);