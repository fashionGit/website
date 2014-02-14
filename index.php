<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Designification</title>
</head>
<body style="overflow-y:scroll;">
	
	<?php 
		if(isset($_GET["l"])&&$_GET["l"]==0){}else{echo '<div id="logo"></div>';}
	?>
	
	<div id="mainImg" style="display:none;"></div>

	<div id="anchor" style="display:none;">anchor</div>
	
	<?php include "parts/navbar.php";?>
		<div id="content">

		<div class="container visible-desktop">
			<div class="row-fluid">
				<div class="hero-unit span12"
					style="background-color: rgba(255, 255, 255, 0.8);">
					<h1>
						New exciting fashion from Austria<br> <small>Nice to
							see you</small>
					</h1>
				</div>
			</div>
		</div>

		<div class="container visible-desktop">

			<div class="row-fluid" id="row2">
				<div class="span8">
					<div id="circle1" class="bubbleContent"><br><br>Hello</div>
				</div>
				<div class="span4">
					<div id="circle2" class="bubbleContent"><br><br>I am</div>
				</div>
			</div>
			

			<div class="row-fluid" id="row3">
			<div class="span4"></div>
				<div class="span4">
					<div id="circle3" class="bubbleContent"><br><br>some</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span4">
					<div id="circle4" class="bubbleContent"><br><br>testwise</div>
				</div>
				<div class="span8">
					<div id="circle5" class="bubbleContent"><br><br>content</div>
				</div>
			</div>
		</div>
		<div class="container" style="padding-top: 10%;">
			<div class="well">
				<div class="row-fluid">
					<h1 class="text-center">Fashion up your life!</h1>
				</div>
				<br> <br> <br> <br> <br>
				<div class="text-center">
					<img alt="" src="img/shirt.png">
				</div>
				<div class="row-fluid" style="padding-top: 40px;">
					<div class="span8">
						<blockquote>
							<p>We are a young fashion company located in Salzburg.</p>
						</blockquote>
					</div>
					<div class="span4">
						<a id="test" href="#" class="thumbnail"> <img alt="shoes"
							src="img/shoes.jpg">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<?php include "parts/footer.html";?>
</body>
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script src="js/index.js" type="text/javascript"></script>
<script type="text/javascript">
	$("#fluidService").click(function(event) {
		event.preventDefault();
		$(this).animate({
			"opacity" : 0,
			"left" : '+=100'
		}, "slow", function() {
			$("#content").fadeOut(function() {
				window.location = "service.html";
			});

		});

	});

	$("#fluidProducts").click(function(event) {
		event.preventDefault();
		$(this).animate({
			"opacity" : 0,
			"left" : '+=100'
		}, "slow", function() {
			$("#content").fadeOut(function() {
				window.location = "products.php";
			});

		});

	});
</script>
</html>