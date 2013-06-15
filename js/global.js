$(document).ready(function() {
	$("#navbar").load("navbar.html");
	$("#footer").load("footer.html");
	
	$("#content").css("display", "none");

    $("#content").fadeIn();
    
	$(".smoothLink").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("#content").fadeOut(redirectPage);		
	});
	
	function redirectPage() {
		window.location = linkLocation;
	}
});