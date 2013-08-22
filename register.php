<?php session_start();

$editMode = false;
$editId = -1;

if(isset($_GET["edit"]))
{
	$editId = $_GET["edit"];
	$editMode = true;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Desiginfication</title>
<style type="text/css">
label.valid {
	width: 24px;
	height: 24px;
	background: url("lib/img/valid.png") center center no-repeat;
	display: inline-block;
	text-indent: -9999px;
}

label.error {
	font-weight: bold;
	color: red;
	padding: 2px 8px;
	margin-top: 2px;
}
</style>
</head>
<body>
	<?php include "navbar.php";?>

	<div id="content">
		<div class="container">

			<div class="row-fluid">
				<div class="well span8 offset2">
					<h1 class="text-center"><?php echo ($editMode) ? "Edit user with id ".$editId : "Hello new customer";?></h1>
					<br>
					<form id="registrationForm" class="form-horizontal"
						action="services/createAccount.php" method="post">

						<div class="control-group">
							<label class="control-label" for="username">Username</label>
							<div class="controls">
								<input type="text" id="username" name="rusername"
									placeholder="Username">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
								<input type="text" id="inputEmail" name="rinputEmail"
									placeholder="Email">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="inputPassword">Password</label>
							<div class="controls">
								<input type="password" id="inputPassword" name="rinputPassword"
									placeholder="Password">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="inputPasswordConfirm">Confirm
								password</label>
							<div class="controls">
								<input type="password" id="inputPasswordConfirm"
									name="rinputPasswordConfirm" placeholder="Password">
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<img src="lib/captcha_code_file.php?rand=<?php echo rand(); ?>"
									id='captchaimg' class="img-polaroid"> <small><br>Die Zeichen im
									Bild sind nicht lesbar? Erneut <a
									href='javascript: refreshCaptcha();'>laden</a>! </small> <br>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for='message'><i
								class="icon-warning-sign"></i> <abbr
								title="Dient zur Überprüfung ob Sie kein Spam Bot sind.">Zeichen</abbr>
								im Bild: </label>
							<div class="controls">
								<input id="code" name="rcode" type="text">
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Register</button>
							</div>
						</div>

					</form>
					<div id="response"></div>
				</div>
			</div>

		</div>
	</div>
	<?php include "footer.html";?>

</body>
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/js/bootstrap.min.js" type="text/javascript"></script>
<script src="lib/js/jquery.validate.min.js"></script>
<script src="lib/js/jquery.form.min.js"></script>
<script src="js/global.js" type="text/javascript"></script>
<script type="text/javascript">
$('#registrationForm').validate(
		 {
		  rules: {
			  rusername:{
			      required: true
			  },rinputEmail:{
			      required: true,
			      email: true
		      },rinputPassword:{
			      required: true
		      },rinputPasswordConfirm:{
			      required: true,
			      equalTo : "#inputPassword"
		      }
		  },
		  highlight: function(element) {
		    $(element).closest('.control-group').removeClass('success').addClass('error');
		  },
		  success: function(element) {
			  $(element).text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
		  }, 
		  submitHandler: function() {
			    $("#registrationForm").ajaxSubmit({ 
			    	target: '#response'
			    }); 
		  }
		 });
		 
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</html>
