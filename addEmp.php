<?php 
	$pageTitle = "Add Employee";
	include("header.php"); 
?>


<div class="container-fluid" id="addEmployeeDiv">
	<div class="content">
		<form>
		  <div class="form-group">
	    	<label for="firstName">First Name</label>
	    	<input type="text" class="form-control" id="firstName" placeholder="First Name">
		  </div>

		  <div class="form-group">
	    	<label for="lastName">Last Name</label>
	    	<input type="text" class="form-control" id="lastName" placeholder="Last Name">
		  </div>

  		  <div class="form-group">
	    	<label for="phNum">Phone Number</label>
	    	<input type="text" class="form-control" id="phNum" placeholder="ex 555-555-5555">
		  </div>

  		  <div class="form-group">
	    	<label for="address">Street Address</label>
	    	<input type="text" class="form-control" id="address" placeholder="ex 123 Main St">
		  </div>

		  <div class="form-group">
	    	<label for="city">City</label>
	    	<input type="text" class="form-control" id="city" placeholder="City">
		  </div>

		  <div class="form-group">
	    	<label for="state">State</label>
	    	<input type="text" class="form-control" id="state" placeholder="State">
		  </div>

		  <div class="form-group">
	    	<label for="dob">Date of Birth</label>
	    	<input type="text" class="form-control" id="dob" placeholder="ex 01/30/1980">
		  </div>

		  <div class="form-group">
	    	<label for="salary">Salary</label>
	    	<input type="text" class="form-control" id="salary" placeholder="ex 36000">
		  </div>

		  <button type="submit" class="btn btn-success">Add Employee</button>
		</form>
	</div>
</div>

<?php include("footer.php"); ?>
