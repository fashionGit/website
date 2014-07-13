var pathToPartials="partials/";

var fashionApp = angular.module('fashionApp', ['ngRoute','ui.bootstrap'])
.config(function($routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: pathToPartials + 'home.html'
    })
    .when('/home', {
      templateUrl: pathToPartials + 'home.html'
    })
    .when('/news', {
      templateUrl: pathToPartials + 'news.html'
    })
    .when('/twigs', {
      templateUrl: pathToPartials + 'twigs.html'
    })
    .when('/contact', {
      templateUrl: pathToPartials + 'contact.html'
    })
    .when('/evolution', {
      templateUrl: pathToPartials + 'evolution.html',
      controller: EvolutionCtrl
    })
    .when('/shop', {
      templateUrl: pathToPartials + 'shop.html',
      controller: EvolutionCtrl
    })
    .otherwise({
    	templateUrl: pathToPartials + 'error.html'
    });
});