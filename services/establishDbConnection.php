<?php
	$host = "localhost";
	$user = "root";
	$dbpassword = "";
	$dbname = "fashion";
	
	$mydatabase = mysql_connect($host, $user, $dbpassword);
	mysql_select_db($dbname, $mydatabase);
?>