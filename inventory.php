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


<div class="container-fluid feature" id="addEmployeeDiv">
	<div class="content">
		<div class="mInvHeight">
	<h1>Manage Inventory</h1>
	<br>
	<div class="form-group">
		<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> -->
		<form action="dispEditInv.php" method="post">
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
	  	</div>
	  	<button type="Submit" name="submit" class="btn btn-success">Select</button>				
	  </div>
	</form>

		</div>
	</div>
</div>



<?php include("footer.php"); ?>