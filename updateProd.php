<?php 
	$pageTitle = "Update Product";
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

<div class="container-fluid feature">
	<div class="content">

	<h1>Products</h1>

	<h3><?php echo $success; ?></h3>

	<?php 

		$s = "SELECT * 
			  FROM PRODUCT p, DEPARTMENT d, SUPPLIER s
			  WHERE p.Department_ID = d.Department_ID
			  AND p.Supplier_ID = s.Supplier_ID";
			  
	  	  	//added here
		  if ($_GET['sort'] == 'product') {
		  	$s = $s . " ORDER BY p.Product_name";
		  }

		  if ($_GET['sort'] == 'price') {
		  	$s = $s . " ORDER BY p.Product_price";
		  }

		  if ($_GET['sort'] == 'dept') {
		  	$s = $s . " ORDER BY d.Department_name";
		  }

		if ($_GET['sort'] == 'supplier') {
		  	$s = $s . " ORDER BY s.Supplier_name";
		  }

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
	?>
		<div class="container">
          <table class="table table-wrapper" colspan="0">
          <tr>
          	<th><a href="updateProd.php?sort=product">Product</a></th>
          	<th><a href="updateProd.php?sort=price">Price</a></th>
          	<th><a href="updateProd.php?sort=dept">Department</a></th>
          	<th><a href="updateProd.php?sort=supplier">Supplier</a></th>
          </tr>

	<?php

	while ( $row = mysql_fetch_assoc($t) ) :
  		$id = $row['Product_ID'];
  		$product=$row['Product_name'];
  		$price=$row['Product_price'];
  		$department=$row['Department_name'];
  		$supplier=$row['Supplier_name'];

	?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

             <tr>
				<td>
					<?php echo $product; ?>
				</td>
				<td>
					<?php echo $price; ?>
				</td>
				<td>
					<?php echo $department; ?>
				</td>  
				<td>
					<?php echo $supplier; ?>
				</td>                      	
                <td>
                	<a class="btn btn-default" name = "update" href="edit.php?id=<?php echo $id; ?>">Edit</a>
                </td>
            	
                <td>
                	<a class="btn btn-danger" name="delete" href="delete.php?id=<?php echo $id; ?>">Delete</a>
                </td>
             </tr>
         </form>


    <?php endwhile ; ?>

    	  </table>
		</div>
	</div>
</div>

<?php include("footer.php"); ?>