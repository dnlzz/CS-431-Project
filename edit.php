<?php

	$pageTitle = "Edit";
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
		$UID = $_GET['id'];
		$sql = "SELECT * FROM PRODUCT WHERE Product_ID = '$UID'";
		$query = mysql_query($sql) or die(mysql_error());
	}


	if(mysql_num_rows($query)>=1){
	    while($row = mysql_fetch_array($query)) {
	        $product = $row['Product_name'];
	        $price = $row['Product_price'];
	        $department = $row['Department_ID'];
	        $supplier = $row['Supplier_ID'];
	    }
?>

<div class="container-fluid feature" id="addEmployeeDiv">
	<div class="content">

	<h3>Edit Product</h3>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

		<input type="hidden" name="ID" value="<?=$UID;?>">


		<label for="product">Product</label> 
			<input type="text" name="ud_product" value="<?php echo $product; ?>" class="form-control"><br>
		

		<label for="price">Price</label> 
			<input type="text" name="ud_price" value="<?php echo $price; ?>" class="form-control"><br>
	    

	    <div class="form-group">
	    	<label for="department">Department (select one)</label>
				<select class="form-control" name="ud_department">
				    <option value="1" <?php if ($department == 1) echo 'selected="selected"'; ?> >Produce</option>
				    <option value="2" <?php if ($department == 2) echo 'selected="selected"'; ?> >Meat</option>
				    <option value="3" <?php if ($department == 3) echo 'selected="selected"'; ?> >Seafood</option>
				    <option value="4" <?php if ($department == 4) echo 'selected="selected"'; ?> >Bakery</option>
				    <option value="5" <?php if ($department == 5) echo 'selected="selected"'; ?> >Deli</option>
				    <option value="6" <?php if ($department == 6) echo 'selected="selected"'; ?> >Pharmacy</option>
				    <option value="7" <?php if ($department == 7) echo 'selected="selected"'; ?> >Specialty</option>
				    <option value="8" <?php if ($department == 8) echo 'selected="selected"'; ?> >Frozen</option>
			  	</select>		
	    </div>

	    <div class="form-group">
	    	<label for="supplier">Supplier (select one)</label><br>
				<select class="form-control" name="ud_supplier">
				    <option value="1" <?php if ($supplier == 1) echo 'selected="selected"'; ?> >C&S Suppliers</option>
				    <option value="2" <?php if ($supplier == 2) echo 'selected="selected"'; ?> >AVS Suppliers</option>
			  	</select>		
	    </div>
		<br>
		<input type="Submit" value="Update" class="btn btn-success" name="upSubmit">
		<input type="Submit" value="Cancel" class="btn btn-default" name="cancel">
	</form>

<?php } ?>


	</div>
</div>


<?php 

	if (isset($_POST['upSubmit'])) {
		$uSQL = "UPDATE PRODUCT SET Product_name='$_POST[ud_product]', Product_price='$_POST[ud_price]', Department_ID='$_POST[ud_department]', Supplier_ID='$_POST[ud_supplier]' WHERE Product_ID = '$_POST[ID]'";
		mysql_query($uSQL) or die(mysql_error());
		header("Location: updateProd.php");
	}

	if (isset($_POST['cancel'])) {
		header("Location: updateProd.php");
	}

 ?>


<?php include("footer.php"); ?>