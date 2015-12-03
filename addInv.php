<?php 
	$pageTitle = "Add Inventory";
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

	if (!empty($_POST['addSubmit'])) {
		$prodID = $_POST['product'];
		$wareID = $_POST['wareID'];
		$quantity = $_POST['qty'];

		$add_sql = "INSERT INTO INVENTORY (Product_ID, Warehouse_ID, Number_of_item_in_stock)
					VALUES ('$prodID', '$wareID', '$quantity');";

		$res = ( mysql_query($add_sql) ) or die(mysql_error());

		if ($res) { echo '<script type="text/javascript"> alert(\'Product added to inventory!\'); </script>'; }


	}
?>

<div class="container-fluid feature">
	<div class="content">
	<h1>Add Inventory Items</h1>
	<br>
	<div class="form-group">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<select class="form-control" name="warehouse">
			<option value="0" selected="selected">Select Warehouse...</option>

	<?php 	

	while ($row = mysql_fetch_assoc($result)) {
		$wID = $row['Warehouse_ID'];
		$wName = $row['Warehouse_name'];
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
		$wID = $arr[0];
		$location = $arr[1];
?>
	
	<h3>Add Product to <?php echo $location; ?> Warehouse</h3>

	<?php 

		$sql = "SELECT * FROM PRODUCT";
		$result = ( mysql_query($sql) ) or die( mysql_error() );

	 ?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

	<input type="hidden" name="wareID" value="<?php echo $wID; ?>">
	
	<div class="form-group">
		<select class="form-control" name="product">
		<option value="0" selected="selected">Select Product...</option>
	
	<?php 	

	while ($row = mysql_fetch_assoc($result)) {
		$pID = $row['Product_ID'];
		$pName = $row['Product_name'];
	?>
		
    	<option value="<?php echo $pID; ?>"><?php echo $pName; ?></option>
	
	<?php } ?>

  		</select>

	<div class="form-group">
		<label for="qty">Quantity</label>
	    <input type="text" class="form-control" name="qty" placeholder="Quantity">
	</div>

    <input type="Submit" value="Stock it!" name="addSubmit" class="btn btn-success">		

	</form>


<?php } ?>


	</div>
</div>




<?php include("footer.php"); ?>