<?php
session_start();

include 'services/establishDbConnection.php';

$result = mysql_query("SELECT * FROM user");

for ($i=0; $i < mysql_num_rows ($result); $i++)
{
	$readuser[$i] = mysql_fetch_assoc($result);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$hostname = $_SERVER['HTTP_HOST'];
	$path = dirname($_SERVER['PHP_SELF']);

	for ($f=0; $f <$i; $f++)
	{
		if ($email == $readuser[$f]["EMAIL"] && $password == $readuser[$f]["PASSWORD"])
		{

			if ($readuser[$f]["ROLE"])
			{
				$_SESSION['role']=1;
			}
			else
			{
				$_SESSION['role']=0;
			}

			$_SESSION['email']=$readuser[$f]["EMAIL"];
			$_SESSION['username']=$readuser[$f]["USERNAME"];

			$_SESSION['authenticated'] = true;

			// Checking if browser is able to interpret http 1.1
			if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1')
			{
				if (php_sapi_name() == 'cgi')
				{
					header('Status: 303 See Other');
				}
				else
				{
					header('HTTP/1.1 303 See Other');
				}
			}
			//Guides to the next page when to user is logged in
			header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/home.php');
		}
	}
}

//The Index-site which is responsible for further guiding through the application
mysql_free_result($result);
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
	<?php include "navbar.php";?>

	<div id="content">
	
		<div class="container well">
		<?php if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
			

		
		}?></div>
	</div>
	<br>
	<br>
	<br>
	<?php include "footer.html";?>
</body>
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</html>
