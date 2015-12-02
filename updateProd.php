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

		$s = "SELECT * FROM PRODUCT"; 

		( $t = mysql_query($s) ) or die ( mysql_error() ); //Sends sql query to database
	?>
	
          <table class="table table-wrapper" colspan="0">
          <tr>
          	<th>Product</th>
          	<th>Price</th>
          	<th>Department</th>
          	<th>Supplier</th>
          </tr>

	<?php

	while ( $row = mysql_fetch_assoc($t) ) :
  		$id = $row['Product_ID'];
  		$product=$row['Product_name'];
  		$price=$row['Product_price'];
  		$department=$row['Department_ID'];
  		$supplier=$row['Supplier_ID'];

	?>



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
             


    <?php endwhile ; ?>

    	  </table>

	</div>
</div>

<?php include("footer.php"); ?>