jQuery.fn.exists = function() {
	return this.length > 0;
};

$(document).ready(function() {
	if ($("#logo").exists()) {
		$("#logo").fadeOut(4000, function() {
			defaultLoad();
		});
	} else {
		defaultLoad();
	}
});

$(".smoothLink").click(function(event) {
	event.preventDefault();
	linkLocation = this.href;
	if(linkLocation==window.location){return 0;}
	if ($("#mainImg").exists()) {
		$("#content").fadeOut(function() {
			$("#mainImg").fadeOut(redirectPage);
		});
	} else {
		$("#content").fadeOut(redirectPage);
	}
});

function defaultLoad() {
	if ($("#mainImg").exists()) {
		$("#mainImg").fadeIn(1000, function() {
			$("#content").fadeIn(1000);
		});
	} else {
		$("#content").fadeIn(2000);
	}
}

function redirectPage() {
	window.location = linkLocation;
}