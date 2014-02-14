<?php session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Desiginfication</title>
</head>
<body>
	<?php include "parts/navbar.php";?>

	<div id="content">
		<div class="container">
			<div class="row-fluid">
				<div class="well span8 offset2">
					<h1 class="text-center">Login</h1>
					<br>
					 <form action="home.php" method="post">
					  <fieldset>
					    <input type="text" placeholder="E-Mail" name="email">
					    <input type="password" placeholder="Password" name="password">
						<br>
					    <button type="submit" class="btn btn-success">Submit</button>
					  </fieldset>
					</form>
					<div id="response"></div>
				</div>
			</div>

		</div>
	</div>
	<?php include "parts/footer.html";?>

</body>
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</html>
