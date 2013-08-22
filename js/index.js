var firedFirst;
var firedSecond;
var firedThird;


$(document).ready(function() {
	firedFirst=false;
	firedSecond=false;
	firedThird=false;
});

$(window).scroll(function() {
	
    var y_scroll_pos = window.pageYOffset;

    if(y_scroll_pos > 150 && firedFirst==false) {
    	firedFirst=true;
    	$( "#circle1" ).show().animate({
    	    width: "500px",
    	    height: "500px",
    	  }, 2000,function(){
    		  $( "#circle2" ).show().animate({
    			    width: "300px",
    			    height: "300px",
    			  },2000);
    		  
    	  });
    }
    
    if(y_scroll_pos > 500 && firedSecond==false) {
    	firedSecond=true;
    $( "#circle3" ).show().animate({
	    width: "200px",
	    height: "200px",
	  });
    }
    
    if(y_scroll_pos > 700 && firedThird==false) {
    	firedThird=true;
    	$( "#circle4" ).show().animate({
    	    width: "300px",
    	    height: "300px",
    	  }, 2000,function(){
    		  $( "#circle5" ).show().animate({
    			    width: "600px",
    			    height: "600px",
    			  },2000);
    		  
    	  });
    }
});