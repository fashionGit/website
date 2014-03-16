var pathToPartials="partials/"

var fashionApp = angular.module('fashionApp', ['ngRoute','ui.bootstrap'])
.config(function($routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: pathToPartials + 'home.html'
    })
    .when('/home', {
      templateUrl: pathToPartials + 'home.html'
    })
    .when('/products', {
      templateUrl: pathToPartials + 'products.html'
    })
    .when('/contact', {
      templateUrl: pathToPartials + 'contact.html'
    })
    .when('/evolution', {
      templateUrl: pathToPartials + 'evolution.html',
      controller: EvolutionCtrl
    })
    .otherwise({
    	templateUrl: pathToPartials + 'error.html'
    });
});
