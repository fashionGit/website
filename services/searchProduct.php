<?php 
session_start();

include 'establishDbConnection.php';
include '../objects/product.php';

if(isset($_POST['submit']))
{	
	$searchString = $_POST['searchs'];
	$result = mysql_query("SELECT * FROM products WHERE NAME LIKE '%".$searchString."%';");
	
	for ($i=0; $i < mysql_num_rows ($result); $i++)
	{
		$readproducts[$i] = mysql_fetch_assoc($result);
	}
	mysql_free_result($result);
	
	?>
	<table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Group</th>
                </tr>
              </thead>
              <tbody>
              <?php for ($f=0; $f <$i; $f++)
				{
					echo "<tr id='rowProduct".$readproducts[$f]["ID"]."'>";
					echo "<td>".$readproducts[$f]["ID"]."</td>";
					echo "<td>".$readproducts[$f]["NAME"]."</td>";
					echo "<td>".$readproducts[$f]["GROUP"]."</td>";
					?>
					<td>
						<button type="submit" name="deleteProduct" class="close" value="<?php echo $readproducts[$f]["ID"]?>">&times;</button>
					</td>
					<?php 
					echo "</tr>";
				}?>
              </tbody>
            </table>
	<?php 
}
?>