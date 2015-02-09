'use strict';
/* Controllers */
var catControllers = angular.module('catControllers', []);
catControllers.controller('CatListCtrl', ['$scope', 'Cat',
    function($scope, Cat) {
        $scope.cats = Cat.query({catId: null});
        $scope.orderProp = 'editedon';
    }]);
catControllers.controller('CatDetailCtrl', ['$scope', '$routeParams', 'Cat',
    function($scope, $routeParams, Cat) {
        $scope.cat = Cat.get({catId: $routeParams.catId,expand:'photos'}, function(cat) {
        });
    }]);
catControllers.controller('CatEditCtrl', ['$scope', '$routeParams', 'Cat',
    function($scope, $routeParams, Cat) {
        $scope.cat = Cat.get({catId: $routeParams.catId,expand:'photos'}, function(cat) {
        });

        $scope.save = function () {
            Cat.save();
        };
    }]);