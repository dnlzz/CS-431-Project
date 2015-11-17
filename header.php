<?php define("TITLE", "SupermarketSweep"); ?>

<html>
<head>
	<meta charset="UTF-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<link rel="stylesheet" href="main.css">

	<title>Home | <?php echo TITLE; ?></title>
</head>

<body>
<div class="navbar-wrapper">
  <nav class="navbar navbar-default navbar-static-top navbar-inverse">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
       	<a class="navbar-brand" href="index.php">Supermarket Manager!</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      	<ul class="nav navbar-nav navbar-right">
            <li <?=echoActiveClassIfRequestMatches("index")?>>
              <a href="index.php">Home</a></li>
    
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="addEmp.php">Employee</a></li>
              <li><a href="addProd.php">Product</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Update/Remove<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="updateEmp.php">Employee</a></li>
              <li><a href="updateProd.php">Product</a></li>
            </ul>
          </li>

            <li <?=echoActiveClassIfRequestMatches("search")?>>
              <a href="search.php">Search</a></li>
  <?php 

  function echoActiveClassIfRequestMatches($requestUri)
  {
      $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

      if ($current_file_name == $requestUri)
          echo 'class="active"';
  }

  ?>

      	</ul>
    </div><!-- /.container-fluid -->
  </nav>
</div>  