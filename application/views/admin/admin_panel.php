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
			.form-inline {
				padding-bottom: 10px;
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
				<li class="active"><a href="<?php echo base_url();?>admin">Home</a></li>
				<li><a href="<?php echo base_url();?>admin/add_products_page">Add Products</a></li>
				<li><a href="<?php echo base_url();?>admin/add_categories_page">Add SubCategories</a></li>
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

			<div class="row">
				<header class="col-lg-12 col-md-12 well jumbotron">
					<div class="container">
						<h1>Welcome to the Zamzam Admin Panel</h1>
						<p> Begin by searching products, where you can edit and delete products in 
							the database, or add a new product by clicking on the "Add Products" link 
							above.
						</p>
					</div>
				</header>
			</div>
			<!-- Flash messages for edit/upload file: -->
			<?php if ($this->session->flashdata('success')):?>
					<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('success');?>
					</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('error')):?>
					<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('error');?> But that's okay, the other information for the 
					product was still updated successfully. To edit the image, go back to the edit page for the product 
					and choose an appropriate image.
					</div>
			<?php endif; ?>
			
			<!-- Flash messages for delete: -->
			<?php if ($this->session->flashdata('success_delete')):?>
					<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('success_delete');?>
					</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('error_delete')):?>
					<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('error_delete');?>
					</div>
			<?php endif; ?>
			
			<!-- Flash messages for creating account: -->
			<?php if ($this->session->flashdata('account_success')):?>
					<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('account_success');?>
					</div>
			<?php endif; ?>
			
			<?php if ($this->session->flashdata('account_error')):?>
					<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('account_error');?>
					</div>
			<?php endif; ?>

		</div> <!-- /container -->
		
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

	</body>
</html>