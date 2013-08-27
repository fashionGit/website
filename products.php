<?php session_start();
include 'objects/product.php';
include 'services/establishDbConnection.php';

$result = mysql_query("SELECT * FROM products");
for ($i=0; $i < mysql_num_rows ($result); $i++)
{
	$readproducts[$i] = mysql_fetch_assoc($result);
}

for ($f=0; $f < mysql_num_rows ($result); $f++)
{
	$products[$f] = new Product($readproducts[$f]["ID"], $readproducts[$f]["NAME"], $readproducts[$f]["GROUP"]);
}
mysql_free_result($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="lib/css/scrollbar.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Desiginfication</title>
</head>
<body style="overflow-y: scroll">
	<?php include "navbar.php";?>

	<div id="content">
		<div class="container">
			<div class="well">
				
				<?php for($i=0;$i<$f;$i++){?>
<!-- 								<div class="row-fluid"> -->
<!-- 										<div class="offset3 span9"><h1>Hwllo</h1><hr></div></div> -->
				<?php if($i==0){?>
				
				<div class="span2 affix" style="top:70px;">
					<ul class="nav nav-list">
                <li class="nav-header">Products</li>
               <li class="divider"></li>
                <li class="active"><a href="#">Shirts</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Trowsers</a></li>
              </ul>
				</div>
				<?php }?>
				<?php if($i%3 == 0){?>
				<div class="row-fluid">
									<ul class="thumbnails">
										<li class="offset3 span3">
				
				<?php }else{echo "<li class='span3'>";}?>	
				
							<div class="thumbnail">
								<a href="#"><img alt="<?php echo $products[$i]->getName(); ?>"
									src="<?php 
									$firstimg = $products[$i]->loadImages();
									echo $firstimg[0]; 
									
									?>"></a>
								<div class="caption">
									<h3><?php echo $products[$i]->getName(); ?></h3>
									<p>
									<?php //echo $products[$i]->loadDescription(); ?>
									</p>
									<p>
										<a id="industrietore" href="#" class="btn btn-danger">Add to cart<i class="icon-arrow-right icon-white"></i>
										</a>
									</p>
								</div>
							</div>
						</li>
				<?php if($i%3 == 2){?>	
				</ul>
				</div><?php }
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
<script src="lib/js/waypoints.min.js" type="text/javascript"></script>
<script src="lib/js/scrollbar.min.js" type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(window).mCustomScrollbar({
    		theme:"dark"
    });
    });
	</script>
</html>
