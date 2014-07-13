
function HeaderController($scope, $location) 
{ 
    $scope.isActive = function (viewLocation) { 
    	return viewLocation === $location.path();
    };
}

function CarouselDemoCtrl($scope) {
	  $scope.myInterval = 5000;
	  var slides = $scope.slides = [];
	    slides.push({
	      image: 'img/test/test1.png',
	      text: 'foo1'
	    });
	    
	    slides.push({
		      image: 'img/test/test2.png',
		      text: 'foo2'
		    });
	    slides.push({
		      image: 'img/test/test3.png',
		      text: 'foo3'
		    });
	}

function AccordionDemoCtrl($scope) {
	  $scope.openVar = true;
	  
	  $scope.acc1IsOpen=true;
	  $scope.acc2IsOpen=false;
	  $scope.acc3IsOpen=false;
	  $scope.acc4IsOpen=false;

	  
	}
function EvolutionCtrl($scope, $routeParams) {
//		init();
}
