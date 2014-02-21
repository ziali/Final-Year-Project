<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Categories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
	
    <style>
	  #form-div {
		margin-top: 30px;
		}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
	
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">

		<div class="navbar-header">
			<a class="navbar-brand" href="#">Zamzam International</a>
		</div>
	
		<ul class="nav navbar-nav">
			<li><a href="<?php echo base_url();?>admin">Home</a></li>
			<li><a href="<?php echo base_url();?>admin/add_products_page">Add Products</a></li>
			<li class="active"><a href="<?php echo base_url();?>admin/add_categories_page">Add Sub-categories</a></li>
			<li><a href="<?php echo base_url();?>login/create_account">Create Account</a></li>
			
		</ul>
	
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url();?>login/logout">Log out</a></li>
		</ul>

	</nav>

    <div class="container">

			<form action="<?php echo base_url();?>admin/search_products" method="POST" class="form-inline">
				<div class="row">
					<div class="col-lg-5 col-md-5">
						<label class="sr-only" for="search_field">Search Field</label>
						<div class="input-group">
							<input type="text" name="search_field" id="search_field" class="form-control" placeholder="Search products by name or ID">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Search</button>
							</span>
						</div>
					</div>
				</div>
			</form>

		<div id="form-div" class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 well">
			
			<h3 class="text-center">Add a New Subcategory</h3>
			
			<form action="<?php echo base_url();?>admin/add_subcategories" method="POST" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Main Category:</label>
					<div class="col-lg-10">
						<select name="main_category" class="form-control input-lg">
							<?php foreach($main_categories as $key=>$value) { ?>
								<option value="<?php echo $key; ?>"><?php echo $value;?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">New Subcategory:</label>
					<div class="col-lg-10">
						<input type="text" class="form-control input-lg" name="new_subcategory"/>
					</div>
				</div>
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
		</div>

    </div> <!-- /container -->
	
	
    
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

  </body>
</html>