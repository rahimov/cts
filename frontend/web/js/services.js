'use strict';
/* Services */
var catServices = angular.module('catServices', ['ngResource']);
catServices.factory('Cat', ['$resource',
    function($resource){
        return $resource('http://rest.ct.alexzandr.ru/v1/cats/:catId', {}, {
            query: {method:'GET', params:{catId:'catId'}, isArray:true},
            update: {method: 'PUT', params:{catId:'@id'}}
//            save: {method: 'POST'},
//            delete: {method:'DELETE', params:{catId:'catId'}}
        });
    }]);

var photoServices = angular.module('photoServices', ['ngResource']);
photoServices.factory('Photo', ['$resource',
    function($resource){
        return $resource('http://rest.ct.alexzandr.ru/v1/photos/:catId', {}, {
            query: {method:'GET', params:{catId:'catId'}, isArray:true}
        });
    }]);