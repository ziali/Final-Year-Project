<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Panel</title>
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
				<li><a href="<?php echo base_url();?>admin/add_categories_page">Add SubCategories</a></li>
				<li class="active"><a href="<?php echo base_url();?>login/create_account">Create Account</a></li>
				
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
			
				<h3 class="text-center">Create a new account</h3>
			
				<form class="form-horizontal" id="create_account_form" action="<?php echo base_url();?>login/create" method="POST">
				
				<!-- Not really necessary to show the user this, they already get input specific error messages...
				<?php if(isset($validation_error)):?>
					<span class="label label-danger col-lg-3 col-lg-offset-2">
						<?php echo $validation_error;?>
					</span>
				<?php endif;?>
				
				<br />
				-->
				
				<div class="form-group">
					<label class="col-lg-2 control-label" for="fullname">Full Name:</label>
					<div class="col-lg-10">
					  <input type="text" id="fullname" name="fullname" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="username">Username:</label>
					<div class="col-lg-10">
					  <input type="text" id="username" name="username" placeholder="More than two characters..." class="form-control">
					  <?php echo form_error('username'); ?>
					</div>
					
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label" for="password">Password</label>
					<div class="col-lg-10">
					  <input type="password" id="password" name="password" class="form-control">
						<?php echo form_error('password'); ?>
					</div>
				</div>
				
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Create Account" class="btn btn-success btn-block btn-lg"/>
				</div>
					
				</form>
				
			</div>
		</div> <!-- /container -->
		
		
		
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

	</body>
</html>