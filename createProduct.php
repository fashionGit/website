<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 5 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/global.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Designification</title>
</head>
<body>
	<?php include "parts/navbar.php";?>

	<div id="content">
		<div class="container">
			<div class="row-fluid">
				<div class="well">
					<h1>Create new product</h1>
					<hr>
					<form id="createProductForm" class="form-horizontal"
						action="services/saveProduct.php" method="post">

						<div class="control-group">
							<label class="control-label" for="name">Name</label>
							<div class="controls">
								<input type="text" id="name" name="pname"
									placeholder="Name">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="group">Group</label>
							<div class="controls">
								<input type="text" id="group" name="pgroup"
									placeholder="Group">
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="image">Image</label>
							<div class="controls">
								<input type="file" id="image" name="pimage"
									>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="description">Description</label>
							<div class="controls">
								<textarea rows="5" cols="30" id="description" name="pdescription"
									placeholder="Description"></textarea>
							</div>
						</div>

						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn">Create</button>
							</div>
						</div>

					</form>
					
					<div id="response">
					</div>
					
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
<script src="lib/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#createProductForm').validate(
		 {
		  rules: {
			  pname:{
			      required: true
			  },pgroup:{
			      required: true
		      },pimage:{
			      required: true
		      },pdescription:{
			      required: true
		      }
		  },
		  highlight: function(element) {
		    $(element).closest('.control-group').removeClass('success').addClass('error');
		  },
		  success: function(element) {
			  $(element).addClass('valid').closest('.control-group').removeClass('error').addClass('success');
		  }, 
		  submitHandler: function() {
			    $("#createProductForm").ajaxSubmit({ 
			    	target: '#response'
			    }); 
		  }
		 });
</script>
</html>