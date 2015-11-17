<?php 
	$pageTitle = "Add Product";
	include("header.php"); 
?>
<div class="container-fluid" id="addEmployeeDiv">
	<div class="content">
		<form>
		  <div class="form-group">
	    	<label for="prodName">Product Name</label>
	    	<input type="text" class="form-control" id="prodName" placeholder="Product Name">
		  </div>

		  <div class="form-group">
	    	<label for="manufacturer">Manufacturer</label>
	    	<input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer">
		  </div>

  		  <div class="form-group">
	    	<label for="price">Price</label>
	    	<input type="text" class="form-control" id="price" placeholder="ex 4.35">
		  </div>

  		  <div class="form-group">
	    	<label for="qty">Quantity</label>
	    	<input type="text" class="form-control" id="qty" placeholder="Quantity">
		  </div>

		  <div class="form-group">
	    	<label for="suplier">Supplier</label>
	    	<input type="text" class="form-control" id="suplier" placeholder="Supplier">
		  </div>

		  <button type="submit" class="btn btn-success">Add Product</button>
		</form>
	</div>
</div>

<?php include("footer.php"); ?>
