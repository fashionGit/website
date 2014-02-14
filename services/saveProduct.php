<?php
session_start();

include 'establishDbConnection.php';
include '../objects/product.php';

$errors = "";
$name = "";
$group = "";
$image = "";
$description = "";

if(isset($_POST['submit']))
{

	$name = $_POST["pname"];
	$group = $_POST["pgroup"];
	$image = $_FILES["pimage"];
	$description = $_POST["pdescription"];
	///------------Do Validations-------------
	if(empty($name)||empty($group)||empty($image)||empty($description))
	{
		$errors .= "\n Provided informations aren't complete. ";
	}

	if(empty($errors))
	{
		$newProduct = new Product(uniqid(), $name, $group);

		if(mysql_query("INSERT INTO  `fashion`.`products` (
				`ID` ,
				`NAME` ,
				`GROUP` 
		) VALUES ('".$newProduct->getId()."','".$newProduct->getName()."','".$newProduct->getGroup()."')"))
		{
			mkdir("../products/".$newProduct->getId(), 0700);
			
			$newpath = "../products/".$newProduct->getId()."/".$newProduct->getId().".jpg";
		if(move_uploaded_file($image['tmp_name'], $newpath)) {
			echo "The file has been uploaded";
		} else{
			echo "There was an error uploading the file, please try again!";
		}
			
			$file = "../products/".$newProduct->getId()."/description.txt";
			file_put_contents($file, $description);
			
			echo "<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<h4>Product has been created!</h4>
					It is now visible on the page.
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
?>