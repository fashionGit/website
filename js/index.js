$('body').waypoint(function() {
	$( "#circle1" ).show().animate({
	    width: "500px",
	    height: "500px",
	  }, 2000,function(){
		  $( "#circle2" ).show().animate({
			    width: "300px",
			    height: "300px",
			  },2000);
		  
	  });
	},{triggerOnce: true});

$('#row2').waypoint(function() {
	$( "#circle3" ).show().animate({
	    width: "200px",
	    height: "200px",
	  });
	},{triggerOnce: true});

$('#row3').waypoint(function() {
	$( "#circle4" ).show().animate({
	    width: "300px",
	    height: "300px",
	  }, 2000,function(){
		  $( "#circle5" ).show().animate({
			    width: "600px",
			    height: "600px",
			  },2000);
		  
	  });
	},{triggerOnce: true});