<div class="row-fluid">
	<div class="well well-small span6">
		<h1>
			Control center <small>for <?php
			$cUser = unserialize($_SESSION['user']);
			echo $cUser -> getUsername();
			?>
			</small>
		</h1>
	</div>
</div>

<div class="row-fluid">
	<div class="well">
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#general" data-toggle="tab"><i
						class="icon-globe"></i> General</a>
				</li>
				<li><a href="#cart" data-toggle="tab"><i class="icon-shopping-cart"></i>
						Shopping cart</a></li>
				<li><a href="#orders" data-toggle="tab"><i class="icon-list"></i>
						Orders</a></li>

				<?php if($cUser->getRole()=="admin"){?>
				<li><a href="#management" data-toggle="tab"><i
						class="icon-briefcase"></i> Management</a></li>
				<?php }?>

			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="general">
					<h3>General account information</h3>
					<table class="table">
						<tbody>
							<tr>
								<td style="text-align: right;"><strong>Username</strong></td>
								<td><?php echo $cUser->getUsername()?> <a class="btn btn-mini"
									href="#"><i class="icon-edit"></i> </a></td>
								<!-- 								collapsable -->
							</tr>
							<tr>
								<td style="text-align: right;"><strong><abbr
										title="Adress where bills will be sent to" class="initialism">Email</abbr>
								</strong></td>
								<td><?php echo $cUser->getEmail()?> <a class="btn btn-mini"
									href="#"><i class="icon-edit"></i> </a></td>
							</tr>
							<tr>
								<td style="text-align: right;"><strong>Account type</strong></td>
								<td><?php echo $cUser->getRole()?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane" id="cart">
					<p>Howdy, I'm in Section B.</p>
				</div>
				<div class="tab-pane" id="orders">
					<p>What up girl, this is Section C.</p>
				</div>

				<!-- 				Admins space -->

				<?php if($cUser->getRole()=="admin"){?>
				<div class="tab-pane" id="management">
					<h3>Site user management</h3>

					<form id="searchUser" action="services/searchUser.php"
						method="post">
						<div class="input-append span4">
							<input autocomplete="off" type="text" id="search" name="searchs"
								data-provide="typeahead" data-items="4" />
							<button class="btn" type="submit" name="submit">
								<i class="icon-search"></i>
							</button>
						</div>
					</form><br>
					<small>Based on registered mail address</small>
					<script type="text/javascript">
					var subjects = new Array();
					<?php 
					$foundAccounts="";
					for ($f=0; $f <$i; $f++)
					{
					?>
					subjects.push("<?php echo $readuser[$f]["EMAIL"];?>");
					<?php } ?>
					</script>
					<br>
					<div style="height: 20px;"><img id="loading" style="display: none;" src="img/loader.gif"></div>
					<br>
					
					<form id="editForm" action="services/edit.php" name="editForm" method="post">
							<div id="result"></div>
					</form>
					<div id="editResult"></div>
				</div>
				<?php }?>

			</div>
		</div>
	</div>
</div>
