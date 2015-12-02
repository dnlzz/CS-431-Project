<?php 
	$pageTitle = "Update Employee";
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
	<h1>Employees</h1>

<?php 
	$query=mysql_query("SELECT * FROM PRODUCT");
  	$i=1;
  	
  	while($row = mysql_fetch_array($query))
  	{
  		$id = $row['Product_ID'];
  		$product=$row['Product_name'];
  		$price=$row['Product_price'];
  		$department=$row['Department_ID'];
  		$supplier=$row['Supplier_ID'];
?>

  <p> USER NAME : <span><?php echo $product; ?></span>
    <a href="delete.php?id=<?php echo $id; ?>" 
    onclick="return confirm('Are you sure you want to delete this Record?');">
            <span class="delete" title="Delete"> X </span></a>
  </p>
  <br />
  <p> PRICE : <span><?php echo $price; ?></span>
    <a href="edit.php?id=<?php echo $id; ?>"><span class="edit" title="Edit"> E </span></a>
  </p>
  <br />
  <p> DEPARTMENT NO : <span><?php echo $department; ?></span>
  </p>
  <br />
  <p> SUPPLIER ON : <span><?php echo $supplier; ?></span>
  </p>
  <br />

	

<?php } ?>
	
	</div>
</div>

<?php include("footer.php"); ?>