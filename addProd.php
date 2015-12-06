<?php 
	$pageTitle = "Add Product";
	include("header.php"); 
	include("accounts.php");

		// Create connection
	$conn = mysql_connect($hostname, $username, $password);
	$db = mysql_select_db("Supermarket");
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>
<div class="container-fluid" id="addEmployeeDiv">
	<div class="content">

<?php
			// define variables and set to empty values
			$productErr = $priceErr = $quantityErr = $departmentErr = $supplierErr = "";
			$product = $price = $quantity = $department = $supplier = "";
			$success = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {

			   	if (empty($_POST["product"])) {
			    	$productErr = "Product name is required";
			   	} else {
			    	$product = test_input($_POST["product"]);
		   		}
			
			   	if (empty($_POST["price"])) {
			    	$priceErr = "Price is required";
			   	} else {
			    	$price = test_input($_POST["price"]);
		   		}


			   	if (empty($_POST["department"])) {
			    	$departmentErr = "Department is required";
			   	} else {
			    	$department = test_input($_POST["department"]);
		   		}

			   	if (empty($_POST["supplier"])) {
			    	$supplierErr = "Supplier is required";
			   	} else {
			    	$supplier = test_input($_POST["supplier"]);
		   		}


			    if ( (!empty($_POST["product"])) and (!empty($_POST["price"])) and (!empty($_POST["supplier"])) and (!empty($_POST["department"])) ) 
			    {
			    	$sql = "INSERT INTO PRODUCT (Product_name, Product_price, Department_ID, Supplier_ID) VALUES ('$product', '$price', '$department', '$supplier');";
			    	if ( mysql_query($sql) ) {
			    		$success = "Product added!";	
			    	} else {
			    		echo "ERROR ADDING PRODUCT";
		    		}
			    	
			    }

			}

			function test_input($data) {
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}

	?>

		<h3><?php echo $success; ?></h3>
	<div class="prodHeight">
		<div id="inner">
			<h1>Add Product...</h1>
		</div>

		<h5>* Field is Required</h5>


		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div class="form-group">
	    	<label for="product">Product Name  *<span class="error"><?php echo $departmentErr;?></span></label>
	    	<input type="text" class="form-control" name="product" placeholder="Product Name">
		  </div>

  		  <div class="form-group">
	    	<label for="price">Price  *<span class="error"><?php echo $departmentErr;?></span></label>
	    	<input type="text" class="form-control" name="price" placeholder="ex 4.35">
		  </div>


		  <div class="form-group">
	    	<label for="department">Department (select one)  *<span class="error"><?php echo $departmentErr;?></span></label>
				<select class="form-control" name="department">
				    <option value="1">Produce</option>
				    <option value="2">Meat</option>
				    <option value="3">Seafood</option>
				    <option value="4">Bakery</option>
				    <option value="5">Deli</option>
				    <option value="6">Pharmacy</option>
				    <option value="7">Specialty</option>
				    <option value="8">Frozen</option>
			  	</select>		
		  </div>

  		  <div class="form-group">
	    	<label for="supplier">Supplier (select one)  *<span class="error"><?php echo $supplierErr;?></span></label><br>
				<select class="form-control" name="supplier">
				    <option value="1">C&S Suppliers</option>
				    <option value="2">AVS Suppliers</option>
			  	</select>		
		  </div>

		  <button type="submit" class="btn btn-success">Add Product</button>
		</form>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>
