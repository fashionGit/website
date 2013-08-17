$(document).ready(function() {
	
	$("#content").css("display", "none");

    $("#content").fadeIn(3000);
    
	$(".smoothLink").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("#content").fadeOut(redirectPage);		
	});
	
	function redirectPage() {
		window.location = linkLocation;
	}
});