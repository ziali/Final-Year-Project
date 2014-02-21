<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		}
    </style>
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
	
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Zamzam International</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo base_url();?>admin">Home</a></li>
              <li><a href="<?php echo base_url();?>admin/add_products_page">Add Products</a></li>
			  <li><a href="<?php echo base_url();?>admin/add_categories_page">Add SubCategories</a></li>
			  <li><a href="<?php echo base_url();?>login/create_account">Create Account</a></li>
			  <li><a href="<?php echo base_url();?>login/logout">Log out</a></li>
            </ul>
			 
			
			
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

		<form action="<?php echo base_url();?>admin/search_products" method="POST" class="form-inline">
            <input type="text" name="search_field" class="input-large" placeholder="Search products by name">
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
		
<div class="row-fluid well">
	<?php 
		echo $product_details[0]['title'];
		//echo $product_details[1]['value'];
	var_dump($product_details);
	print_r($product_details);?>
</div>

    </div> <!-- /container -->
	
	
    
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>