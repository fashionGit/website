<?php
session_start();

include 'establishDbConnection.php';
include '../objects/user.php';

if(isset($_POST["delete"]))
{
	if($_POST["delete"]==unserialize($_SESSION["user"])->getId())
	{
		echo "<div class='alert alert-error'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<h4>Warning! Can't delete yourself!</h4>
				</div>";
	}
	else {

		if(mysql_query("DELETE FROM user WHERE ID = ".$_POST["delete"].";"))
		{
			echo "<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<h4>User has been deleted</h4>
					</div>";
		}
		else
		{
			echo "<div class='alert alert-error'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<h4>Warning! Something went wrong!</h4>
					</div>";
		}
	}
}
?>