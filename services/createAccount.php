<?php
session_start();

include 'establishDbConnection.php';
include '../objects/user.php';

$errors = "";
$username = "";
$inputEmail = "";
$inputPassword = "";
$inputPasswordConfirm = "";

if(isset($_POST['submit']))
{

	$username = $_POST["rusername"];
	$inputEmail = $_POST["rinputEmail"];
	$inputPassword = $_POST["rinputPassword"];
	$inputPasswordConfirm = $_POST["rinputPasswordConfirm"];
	///------------Do Validations-------------
	if(empty($username)||empty($inputEmail))
	{
		$errors .= "\n Name and mail are mandatory fields. ";
	}
	if(IsInjected($inputEmail))
	{
		$errors .= "\n Injection in email adress detected!";
	}
	if(empty($_SESSION['code'] ) ||
			strcmp($_SESSION['code'], $_POST['rcode']) != 0)
	{
		$errors .= "\n Captcha input doesn't match the captcha shown!";
	}

	$result = mysql_query("SELECT * FROM user");

	for ($i=0; $i < mysql_num_rows ($result); $i++)
	{
		$readuser[$i] = mysql_fetch_assoc($result);
	}

	for ($f=0; $f <$i; $f++)
	{
		if ($inputEmail == $readuser[$f]["EMAIL"])
		{
			$errors .= "\n E-Mail is already in use by existing user!";
		}
	}

	if(empty($errors))
	{
		$newUser = new User("Not set yet", $username, $inputEmail, $inputPassword, "user");



		if(mysql_query("INSERT INTO  `fashion`.`user` (
				`ID` ,
				`USERNAME` ,
				`EMAIL` ,
				`PASSWORD` ,
				`ROLE`
		) VALUES (NULL,'".$newUser->getUsername()."','".$newUser->getEmail()."','".$newUser->getPassword()."','".$newUser->getRole()."')"))
		{
			echo "<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<h4>Your account has been created!</h4>
					Feel free to log in.
					</div>";
		}
		else
		{
			echo "<div class='alert alert-error'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<h4>Warning!</h4>
					Somthing went wrong with the db.
					</div>";
		}
	}
	else
	{
		echo "<div class='alert alert-error'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<h4>Warning!</h4>
				".$errors."
						</div>";
	}
}

// Function to validate against any email injection attempts
function IsInjected($str)
{
	$injections = array('(\n+)',
			'(\r+)',
			'(\t+)',
			'(%0A+)',
			'(%0D+)',
			'(%08+)',
			'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str))
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>