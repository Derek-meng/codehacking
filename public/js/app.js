var myApp = angular.module('myApp', ['ngMessages']);

myApp.controller('mainController', ['$scope', '$filter' , function($scope, $filter) {
    
    $scope.name = '';
    $scope.email="";
    $scope.title="";
    $scope.lowercasehandle = function() {
        return $filter('lowercase')($scope.handle);
    };
    
}]);
