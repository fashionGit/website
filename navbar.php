<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <div class="navbar-inner">
                <div class="container">
                
                <?php 
                
                		if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true){?>
		                	<a style="float:right;" class="btn btn-inverse" href="logout.php" >Logout</a>
		                	<a style="float:right; margin-right: 20px;" class="btn btn-info smoothLink" href="home.php" ><?php echo $_SESSION['username'];?></a>
				<?php 	} else {?>
							<a style="float:right;" class="btn btn-inverse" role="button" href="#myModal"  data-toggle="modal">Login</a>
							<a style="float:right; margin-right: 20px;" class="btn btn-success smoothLink" href="register.php" >Register</a>
                <?php 	} ?>
                
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse"> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>
                    </a> <a class="brand smoothLink" href="index.php?l=0">Designification</a>

                    <div class="nav-collapse navbar-responsive-collapse in collapse" style="height: auto;">
                        <ul class="nav" >
                            <li class="active"><a class="smoothLink" href="index.php?l=0">Home</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Products<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-header">Gender</li>
                                    <li><a href="products.php">Female</a></li>
                                    <li><a href="products.php">Male</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Categories</li>
                                    <li><a href="products.php#shirts">Shirts</a></li>
                                    <li><a href="products.php#trowsers">Trowsers</a></li>
                                    <li><a href="products.php#shoes">Shoes</a></li>
                                </ul></li>
                            <li><a href="#">Contact</a></li>
							
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3 id="myModalLabel">Please submit your credentials</h3>
  </div>
  <div class="modal-body">
    <form action="home.php" method="post">
  <fieldset>
    <input type="text" placeholder="E-Mail" name="email">
    <input type="password" placeholder="Password" name="password">
	<br>
    <button type="submit" class="btn btn-success">Submit</button>
  </fieldset>
</form>
  </div>
</div>
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script>
	var title = window.location.href;
	$(".navElement").each(function() {
		if (title.indexOf(($(this).children().attr('href'))) > -1) {
			$(this).addClass("active");
		} else {
			$(this).removeClass("active");
		}
	});

	$(".smoothLink").click(function(event) {
		event.preventDefault();
		linkLocation = this.href;
		$("#content").fadeOut(redirectPage);
	});
	function redirectPage() {
		window.location = linkLocation;
	}
</script>