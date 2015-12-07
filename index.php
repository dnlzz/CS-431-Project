<?php 
	$pageTitle = "Home";
	include("header.php"); 
?>

   
    <div class="jumbotron">
      <div class="container centered">
       <img src="http://amanoverseas.com/blog/wp-content/uploads/2013/11/fmcg.jpg" alt="Go You!">
      </div>
    </div>

    <div class="container-fluid feature">
      
	<div class="container">
      <div class="row">
	      <div class="col-md-2"></div>
	        <div class="col-md-4">
	          <h2>Inventory Management</h2>
	          <p>Add, Edit, Update and Delete Inventory Items Across Multiple Locations. Life Changing!</p>
	          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalInv">
 				Learn More &raquo;
			  </button>

				<!-- Modal -->
				<div class="modal fade" id="myModalInv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Inventory Management</h4>
				      </div>
				      <div class="modal-body">
				        <p>You can manage your store's inventory and it is awesome&hellip;</p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

	        </div>
	        <div class="col-md-4">
	          <h2>Employess Management</h2>
	          <p>Add, Edit, Update and Delete Employees Across Multiple Departments. Amazing!</p>
	          
	          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalEmp">
 				Learn More &raquo;
			  </button>

				<!-- Modal -->
				<div class="modal fade" id="myModalEmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Employee Management</h4>
				      </div>
				      <div class="modal-body">
				        <p>You can manage your store's employees and it is even more awesome than Inventory Management&hellip;</p>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

	       </div>
	       <div class="col-md-2"></div>
	      </div>
      </div>
	</div>
<?php include("footer.php"); ?>