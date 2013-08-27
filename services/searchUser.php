<?php 
session_start();

include 'establishDbConnection.php';
include '../objects/user.php';

if(isset($_POST['submit']))
{	
	$searchString = $_POST['searchs'];
	$result = mysql_query("SELECT * FROM user WHERE EMAIL LIKE '%".$searchString."%';");
	
	for ($i=0; $i < mysql_num_rows ($result); $i++)
	{
		$readuser[$i] = mysql_fetch_assoc($result);
	}
	mysql_free_result($result);
	
	?>
	<table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
              <?php for ($f=0; $f <$i; $f++)
				{
					echo "<tr id='rowUser".$readuser[$f]["ID"]."'>";
					echo "<td>".$readuser[$f]["ID"]."</td>";
					echo "<td>".$readuser[$f]["USERNAME"]."</td>";
					echo "<td>".$readuser[$f]["EMAIL"]."</td>";
					echo "<td>".$readuser[$f]["ROLE"]."</td>";
					if(unserialize($_SESSION["user"])->getId()!=$readuser[$f]["ID"])
					{
					?>
					<td>
						<button type="submit" name="deleteUser" class="close" value="<?php echo $readuser[$f]["ID"]?>">&times;</button>
					</td>
					<?php }else{
						echo "<td></td>";
					}
					echo "</tr>";
				}?>
              </tbody>
            </table>
	<?php 
}
?>