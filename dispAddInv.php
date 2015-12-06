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

		if ( mysql_query($add_sql) ) {

			echo ("<SCRIPT LANGUAGE='JavaScript'>
    			window.alert('Inventory Item Added!')
    			window.location.href='./addInv.php';
    			</SCRIPT>");
			
		}
		else { 
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    			window.alert('Inventory Item Already in Inventory!')
    			window.location.href='./addInv.php';
    			</SCRIPT>");
			
		}

	}
?>

<?php 

	if (isset($_POST['submit'])){
		$wID = $_POST['warehouse'];
		$arr = explode(', ', $wID);
		$wID = $arr[0];
		$location = $arr[1];
?>
	
<div class="container-fluid" id="addEmployeeDiv">
	<div class="content">
		<div class="dispAddHeight">
	<h3>Add Product to <?php echo $location; ?> Warehouse</h3>
	<br>
	
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
	</div>
</div>


<?php include("footer.php"); ?>