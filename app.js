var wp = angular.module('weatherApp', ['ngRoute', 'ngSanitize']);

wp.run(['$rootScope', function($rootScope){
    $rootScope.dir = BlogInfo.url;
    $rootScope.site = BlogInfo.site;
    $rootScope.api = AppAPI.url;
}]);

wp.config(function($routeProvider){

    $routeProvider

        .when('/', {
            controller: 'mainController',
            templateUrl:'wp-content/themes/angular/main.php'
        })

        .when('/posts', {
            controller: 'postController',
            templateUrl:'wp-content/themes/angular/posts.php'
        })
        .when('/page/:num', {
            controller: 'pageController',
            templateUrl:'wp-content/themes/angular/page.php'
        })

});

wp.controller('navController', ['$scope', '$log', '$http', function($scope, $log, $http){

    $scope.nav = $http.get($scope.site + "/wp-json/wp/v2/pages").success(function(response){
        $scope.data = response;
    });

}]);

wp.controller('mainController', ['$scope', '$log', '$http', function($scope, $log, $http){

    $scope.heroText = window.heroText;
    $scope.projectOneImage = window.projectOneImage;
    $scope.projectOneHeader = window.projectOneHeader;
    $scope.projectOneText = window.projectOneText;
    $scope.projectTwoImage = window.projectTwoImage;
    $scope.projectTwoHeader = window.projectTwoHeader;
    $scope.projectTwoText = window.projectTwoText;

    $scope.wpAPI = $http.get($scope.site + "/wp-json/wp/v2/posts").success(function(response){
        $scope.data = response;
    });

}]);

wp.controller('postController', ['$scope', '$log', '$http', function($scope, $log, $http){

    $scope.wpAPI = $http.get($scope.site + "/wp-json/wp/v2/posts").success(function(response){
        $scope.data = response;
    });

    $scope.wpAPI = $http.get($scope.site + "/wp-json/wp/v2/taxonomies").success(function(taxResponse){
        $scope.taxData = taxResponse;
        $log.info($scope.taxData);
    });

}]);

wp.controller('pageController', ['$scope', '$log', '$http', '$routeParams', function($scope, $log, $http, $routeParams){

    $scope.num = $routeParams.num;

    $log.log($scope.num);

    $scope.wpAPI = $http.get($scope.site + "/wp-json/wp/v2/pages/" + $scope.num).success(function(response){
        $scope.data = response;
        $scope.img = response.featured_image;
        $http.get($scope.site + "/wp-json/wp/v2/media/" + $scope.img).success(function(imgResponse){
            $scope.imgRes = imgResponse;
            $log.log($scope.imgRes);
        });
    });

}]);
