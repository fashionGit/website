<?php session_start();
include 'services/establishDbConnection.php';
include 'objects/product.php';

if(isset($_GET["pid"])){

	$pid=$_GET["pid"];
	
	$result = mysql_query("SELECT * FROM products WHERE ID LIKE '%".$pid."%';");
	
	for ($i=0; $i < mysql_num_rows ($result); $i++)
	{
		$product[$i] = mysql_fetch_assoc($result);
	}
	
	$productObj = new Product($product[0]["ID"], $product[0]["NAME"], $product[0]["GROUP"]);
	mysql_free_result($result);
}

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
	<?php include "parts/navbar.php";?>

	<div id="content">
		<div class="container">
			<div class="row-fluid">
				<div class="well">
					<h1>Details for <?php echo $productObj->getName(); ?></h1>
					<?php foreach($productObj->loadImages() as $path){?>
					<img src="<?php echo $path; ?>" class="img-polaroid">
					<?php }?>
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