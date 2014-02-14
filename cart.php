<?php session_start();
include "objects/user.php";
include "services/authentication.php";

$user = unserialize($_SESSION['user']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Designification</title>
</head>
<body>

	<?php include "parts/navbar.php";?>

	<div id="content">
		<div class="container">
			<div class="row-fluid">
				<div class="well">
					<h1>Shopping cart for <small><?php echo $user->getUsername();?></small></h1>
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
<script src="lib/js/jquery.form.min.js" type="text/javascript"></script>
</html>