<?php
session_start();

include 'services/establishDbConnection.php';
include 'objects/user.php';

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

			$authenticatedUser = new User($readuser[$f]["ID"], $readuser[$f]["USERNAME"], $readuser[$f]["EMAIL"], $readuser[$f]["PASSWORD"], $readuser[$f]["ROLE"]);
			$_SESSION['username']=$readuser[$f]["USERNAME"];
			$_SESSION['user']=serialize($authenticatedUser);

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
include 'services/authentication.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Designification</title>
<script type="text/javascript">
var subjects = new Array();
</script>
</head>
<body>
	<?php include "navbar.php";?>

	<div id="content">

		<div class="container">
			<div class="row-fluid">
				<?php if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true) {
					include "parts/account.php";
				}?>
			</div>
		</div>

	</div>
	<br>
	<br>
	<br>
	<?php include "footer.html";?>
</body>
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script src="lib/js/jquery.form.min.js" type="text/javascript"></script>
<script>
var aboutToDelete;

$('#searchU').typeahead({source: subjects});

function show(element){
$(element).show(100);
}

$("#editFormUser").ajaxForm({ 
	target: '#editResultUser',
	beforeSubmit: function(formData, jqForm, options) { 

		$("#loadingUser").show();
		
	    aboutToDelete = formData[0]["value"]; 
	    
	    return true; },
	success: function showResponse(responseText, statusText, xhr, $form)  { 
		$("#loadingUser").hide();
		if(responseText.indexOf("success")!=-1)
		{
			$("#rowUser"+aboutToDelete).slideUp();
		}
	} 
}); 

$("#editFormProduct").ajaxForm({ 
	target: '#editResultProduct',
	beforeSubmit: function(formData, jqForm, options) { 

		$("#loadingProduct").show();
		
	    aboutToDelete = formData[0]["value"]; 
	    
	    return true; },
	success: function showResponse(responseText, statusText, xhr, $form)  { 
		$("#loadingProduct").hide();
		if(responseText.indexOf("success")!=-1)
		{
			$("#rowProduct"+aboutToDelete).slideUp();
		}
	} 
}); 

$("#searchUser").ajaxForm({ 
	target: '#resultUser',
	beforeSubmit: function(){
			$("#loadingUser").show();
		},
	success: function(){
		$("#loadingUser").hide();
		}
}); 

$("#searchProducts").ajaxForm({ 
	target: '#resultProduct',
	beforeSubmit: function(){
			$("#loadingProduct").show();
		},
	success: function(){
		$("#loadingProduct").hide();
		}
}); 
</script>
<script type="text/javascript">
//Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
} 

// Change hash for page-reload
$('.nav-tabs a').on('shown', function (e) {
    window.location.hash = e.target.hash;
});
</script>
</html>
