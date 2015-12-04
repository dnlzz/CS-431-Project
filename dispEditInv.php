<?php 
	$pageTitle = "Manage Inventory";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM WAREHOUSE";

	$result = ( mysql_query($sql) ) or die( mysql_error() );

?>

<?php 

	if (isset($_POST['submit'])) {
		$wID = $_POST['warehouse'];
		$arr = explode(', ', $wID);
		$location = $arr[1];
		$sql = "SELECT p.Product_name, i.Number_of_item_in_stock, p.Product_ID, w.Warehouse_ID
				FROM PRODUCT p
				LEFT JOIN INVENTORY i on p.Product_ID = i.Product_ID
				LEFT JOIN WAREHOUSE w on i.Warehouse_ID = w.Warehouse_ID
				WHERE w.Warehouse_ID = '$wID'";
		$result = mysql_query($sql);
?>
	
<div class="container-fluid feature" id="addEmployeeDiv">
	<div class="content">

	<table class="table table-wrapper" colspan="0">
		<h3>Managing <?php echo $location; ?> Warehouse</h3>

		<tr>
			<th>Product</th>
			<th>Quantity in Stock</th>
		</tr>

<?php
		while ($prod = mysql_fetch_assoc($result)) {
			$pID = $prod['Product_ID'];
			$wID = $prod['Warehouse_ID'];
			$pName = $prod['Product_name'];
			$numStock = $prod['Number_of_item_in_stock'];
	
	?>	

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		 <tr>
			<td>
				<?php echo $pName; ?>
			</td> 
			<td><?php echo $numStock; ?></td>
			<td><a class="btn btn-default" name = "update" href="editInv.php?pid=<?php echo $pID; ?>&wid=<?php echo $wID; ?>">Edit</a></td>
	      	<td><a class="btn btn-danger" name="delete" href="deleteInv.php?pid=<?php echo $pID; ?>&wid=<?php echo $wID; ?>">Delete</a></td>      	
	     </tr>
	</form>
 <?php
		}

	}

 ?>
		</table>
	</div>
</div>

<?php include("footer.php"); ?>