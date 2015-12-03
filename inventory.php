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


<div class="container-fluid feature">
	<div class="content">

	<h1>Manage Inventory</h1>
	<br>
	<div class="form-group">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<select class="form-control" name="warehouse">
			<option value="0" selected="selected">Select Warehouse...</option>

	<?php 	

	while ($row = mysql_fetch_assoc($result)) {
		$wID = $row['Warehouse_ID'];
		$wName = $row['Warehouse_name'];
		$wStock = $row['Warehouse_max_stock'];
		$wLoc = $row['Warehouse_location']; 
	?>
		
	    <option value="<?php echo $wID; ?>, <?php echo $wLoc; ?>"><?php echo $wLoc . ", " . $wName ?></option>
	
	<?php } ?>

	  	</select>
	  	<input type="Submit" value="Select" name="submit" class="btn btn-default">		
	  </div>
	</form>

<?php 

	if (isset($_POST['submit'])) {
		$wID = $_POST['warehouse'];
		$arr = explode(', ', $wID);
		$location = $arr[1];
		$sql = "SELECT p.Product_name
				FROM PRODUCT p
				LEFT JOIN INVENTORY i on p.Product_ID = i.Product_ID
				LEFT JOIN WAREHOUSE w on i.Warehouse_ID = w.Warehouse_ID
				WHERE w.Warehouse_ID = '$wID'";
		$result = mysql_query($sql);
?>
	
	<table class="table table-wrapper" colspan="0">
		<h3>Managing <?php echo $location; ?> Warehouse</h3>

<?php
		while ($prod = mysql_fetch_assoc($result)) {
			$pName = $prod['Product_name'];
	
	?>		
	 <tr>
		<td>
			<?php echo $pName; ?>
		</td> 
		<td>Display Quantity</td>
		<td>Edit Button</td>
      	<td>Remove BUtton</td>      	
     </tr>

 <?php
		}

	}

 ?>
		</table>
	</div>
</div>



<?php include("footer.php"); ?>