<?php

	$pageTitle = "Edit Inventory";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if (!isset($_POST['update'])) {
		$pid = $_GET['pid'];
		$wid = $_GET['wid'];
		$sql = "SELECT * 
				FROM PRODUCT p, INVENTORY i, WAREHOUSE w 
				WHERE p.Product_ID = i.Product_ID
				AND w.Warehouse_ID = i.Warehouse_ID
				AND p.Product_ID = '$pid'
				AND w.Warehouse_ID = '$wid'";

		$query = mysql_query($sql) or die(mysql_error());
	}


	if(mysql_num_rows($query)>=1){
	    while($row = mysql_fetch_array($query)) {
	        $product = $row['Product_name'];
	        $qty = $row['Number_of_item_in_stock'];
	    }
?>

<div class="container-fluid feature" id="addEmployeeDiv">
	<div class="content">

	<h3>Edit Inventory</h3>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		<input type="hidden" name="pID" value="<?php echo $pid; ?>">
		<input type="hidden" name="wID" value="<?php echo $wid; ?>">


		<label for="product">Product</label> 
			<input type="text" name="ud_product" value="<?php echo $product; ?>" class="form-control" readonly><br>
		

		<label for="price">Quantity</label> 
			<input type="text" name="ud_qty" value="<?php echo $qty; ?>" class="form-control"><br>
	    
		<br>
		<input type="Submit" value="Update" class="btn btn-success" name="upSubmit">
		<input type="Submit" value="Cancel" class="btn btn-default" name="cancel">
	</form>

<?php } ?>


	</div>
</div>


<?php 

	if (isset($_POST['upSubmit'])) {

		$uSQL = "UPDATE INVENTORY SET Number_of_item_in_stock='$_POST[ud_qty]'
				WHERE Product_ID='$_POST[pID]'
				AND Warehouse_ID='$_POST[wID]'";

		mysql_query($uSQL) or die(mysql_error());
		header("Location: inventory.php");

	}

	if (isset($_POST['cancel'])) {
		header("Location: inventory.php");
	}

 ?>


<?php include("footer.php"); ?>