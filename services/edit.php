<?php
session_start();

include 'establishDbConnection.php';
include '../objects/user.php';

if(isset($_POST["deleteUser"]))
{
	if($_POST["deleteUser"] == unserialize($_SESSION["user"])->getId())
	{
		echo "<div class='alert alert-error'>
				<button type='button' class='close' data-dismiss='alert'>&times;</button>
				<h4>Warning! Can't delete yourself!</h4>
				</div>";
	}
	else {

		if(mysql_query("DELETE FROM user WHERE ID = ".$_POST["deleteUser"].";"))
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


if(isset($_POST["deleteProduct"]))
{
		if(mysql_query("DELETE FROM products WHERE ID = ".$_POST["deleteProduct"].";"))
		{
			echo "<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<h4>Product has been deleted</h4>
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
?>