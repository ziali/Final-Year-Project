<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
    <style>
		#form-div {
			margin-top: 30px;
		}
		
		.form-search {
			margin-bottom: 20px;
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
			<li class="active"><a href="<?php echo base_url();?>admin/add_products_page">Add Products</a></li>
			<li><a href="<?php echo base_url();?>admin/add_categories_page">Add SubCategories</a></li>
			<li><a href="<?php echo base_url();?>login/create_account">Create Account</a></li>
			
		</ul>
	
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url();?>login/logout">Log out</a></li>
		</ul>
	
	</nav>

    <div class="container">

		<form action="<?php echo base_url();?>admin/search_products" method="POST" class="form-inline form-search">
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
		
		
		<div class="btn-group">
		
		   <button id="btn-books" data-target="form_books" class="btn btn-primary btn-xs" type="button">Add Books</button>
		   <button id="btn-clothes" data-target="form_clothes" class="btn btn-primary btn-xs" type="button">Add Clothing</button>
		   <button id="btn-perfumes" data-target="form_perfumes" class="btn btn-primary btn-xs" type="button">Add Perfumes</button>
		   <button id="btn-decor" data-target="form_decor" class="btn btn-primary btn-xs" type="button">Add Decorative Pieces</button>
		   <button id="btn-cd-dvd" data-target="form_cd_dvd" class="btn btn-primary btn-xs" type="button">Add CDs-DVDs</button>
		   <button id="btn-dates-sweets" data-target="form_dates_sweets" class="btn btn-primary btn-xs" type="button">Add Dates &amp; Sweets</button>
	       <button id="btn-electronics" data-target="form_electronics" class="btn btn-primary btn-xs" type="button">Add Electronics</button>
	       <button id="btn-health" data-target="form_health" class="btn btn-primary btn-xs" type="button">Add Health &amp; Beauty</button>
		   <button id="btn-children" data-target="form_children" class="btn btn-primary btn-xs" type="button">Add Childrens Products</button>
		   <button id="btn-accessories" data-target="form_accessories" class="btn btn-primary btn-xs" type="button">Add Accessories</button>
		   <button id="btn-hajjkit" data-target="form_hajjkit" class="btn btn-primary btn-xs" type="button">Hajj Kits</button>
			
		</div>
		
		<!--Display file uploading error, if any-->
		<?php if ($this->session->flashdata('error')):?>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $this->session->flashdata('error');?>
					</div>
				</div>
		<?php endif; ?>
		
		<!--Custom form validation error message-->
		<?php if (isset($validation_error)):?>
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $validation_error;?>
					</div>
				</div>
		<?php endif; ?>
		
		<!--data-target of button must match form id, and class for all forms must be .form-container-->
		<div id="form-div" class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 well">
			
			<form action="<?php echo base_url(); ?>admin/add_book" method="POST" id="form_books" class="form-container form-horizontal" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="1">Books</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options1 = array();
							foreach($categories1 as $key=>$value)
							{ 
								$options1[$key] = $value;
							}
							$css_class = 'class="form-control"';
						//used a form dropdown to allow form_validation to correctly prepopulate sub_category field incase of form_validation error
						echo form_dropdown('sub_category', $options1, $this->input->post('sub_category'), $css_class);
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_name" class="col-lg-offset-1 col-lg-2">Book Title:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_name" id="book_name" value="<?php echo set_value('book_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('book_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_author" class="col-lg-offset-1 col-lg-2">Author:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_author" id="book_author" value="<?php echo set_value('book_author'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_author'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_publisher" class="col-lg-offset-1 col-lg-2">Publisher:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_publisher" id="book_publisher" value="<?php echo set_value('book_publisher'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_publisher'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="book_price" id="book_price" value="<?php echo set_value('book_price'); ?>"/>
						</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="book_stock" min="0"  id="book_stock" value="<?php echo set_value('book_stock'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
					<?php echo form_error('book_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="book_description" class="form-control" cols="64" rows="5" id="book_description"><?php echo set_value('book_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_binding" class="col-lg-offset-1 col-lg-2">Binding:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_binding" placeholder="Paperback or Hardback" id="book_binding" value="<?php echo set_value('book_binding'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_binding'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_size" class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_size" placeholder="i.e. A4, A5, A5 Small, etc" id="book_size" value="<?php echo set_value('book_size'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_size'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_pages" class="col-lg-offset-1 col-lg-2">Number of Pages:</label>
					<div class="col-lg-2">
						<input type="number" class="form-control" name="book_pages" min="0" id="book_pages" value="<?php echo set_value('book_pages'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_pages'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_language" class="col-lg-offset-1 col-lg-2">Language:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="book_language" id="book_language" value="<?php echo set_value('book_language'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_language'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="book_isbn" class="col-lg-offset-1 col-lg-2">ISBN:</label>
					<div class="col-lg-7">
						<input type="number" class="form-control" name="book_isbn" min="0" id="book_isbn" value="<?php echo set_value('book_isbn'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('book_isbn'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_clothes" method="POST" id="form_clothes" class="form-container form-horizontal" enctype="multipart/form-data">
				
				<div class="form-group">
				<label class="col-lg-offset-1 col-lg-2">Category:</label>
				<div class="col-lg-9">
					<select name="main_category" class="form-control">
						<option value="2">Clothing</option>
					</select>
				</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options2 = array();
							foreach($categories2 as $key=>$value) 
							{ 
								$options2[$key] = $value;
							}
						echo form_dropdown('sub_category', $options2, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clothes_name" class="col-lg-offset-1 col-lg-2">Clothing Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="clothes_name" id="clothes_name" value="<?php echo set_value('clothes_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('clothes_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clothes_brand" class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="clothes_brand" id="clothes_brand" value="<?php echo set_value('clothes_brand'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('clothes_brand'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clothes_colour" class="col-lg-offset-1 col-lg-2">Colour:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="clothes_colour" id="clothes_colour" value="<?php echo set_value('clothes_colour'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('clothes_colour'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clothes_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="clothes_price" id="clothes_price" value="<?php echo set_value('clothes_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('clothes_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clothes_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="clothes_stock" min="0" id="clothes_stock" value="<?php echo set_value('clothes_stock'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('clothes_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="sizes[]" class="col-lg-offset-1 col-lg-2">Sizes:</label>
					<div class="col-lg-9">
						<select name="sizes[]" multiple="multiple" id="sizes[]" class="form-control">
							<option value="small" <?php echo set_select('sizes[]', 'small'); ?>>Small</option>
							<option value="medium" <?php echo set_select('sizes[]', 'medium'); ?>>Medium</option>
							<option value="large" <?php echo set_select('sizes[]', 'large'); ?>>Large</option>
							<option value="xlarge" <?php echo set_select('sizes[]', 'xlarge'); ?>>X-Large</option>
							<option value="xxlarge" <?php echo set_select('sizes[]', 'xxlarge'); ?>>XX-Large</option>
						</select>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('sizes[]'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="clothes_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="clothes_description" class="form-control" cols="64" rows="5" id="clothes_description"><?php echo set_value('clothes_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('clothes_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_perfume" method="POST" id="form_perfumes" class="form-container form-horizontal" enctype="multipart/form-data">
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="4">Perfumes</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options3 = array();
							foreach($categories4 as $key=>$value) 
							{ 
								$options3[$key] = $value;
							}
						echo form_dropdown('sub_category', $options3, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="perfume_name" class="col-lg-offset-1 col-lg-2">Perfume Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="perfume_name" id="perfume_name" value="<?php echo set_value('perfume_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('perfume_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="perfume_volume" class="col-lg-offset-1 col-lg-2">Volume/Size:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="perfume_volume" id="perfume_volume" value="<?php echo set_value('perfume_volume'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('perfume_volume'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="perfume_brand" class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="perfume_brand" id="perfume_brand" value="<?php echo set_value('perfume_brand'); ?>" />
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('perfume_brand'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="perfume_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="perfume_description" class="form-control" cols="64" rows="5" id="perfume_description"><?php echo set_value('perfume_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('perfume_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="perfume_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="perfume_price" id="perfume_price" value="<?php echo set_value('perfume_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('perfume_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="perfume_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="perfume_stock" min="0" id="perfume_stock" value="<?php echo set_value('perfume_stock'); ?>" />
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('perfume_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_decor" method="POST" id="form_decor" class="form-container form-horizontal"  enctype="multipart/form-data">
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="5">Decorations</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options4 = array();
							foreach($categories5 as $key=>$value) 
							{ 
								$options4[$key] = $value;
							}
						echo form_dropdown('sub_category', $options4, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="decor_name" class="col-lg-offset-1 col-lg-2">Decorative Piece Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="decor_name" id="decor_name" value="<?php echo set_value('decor_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('decor_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="decor_size" class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="decor_size" id="decor_size" value="<?php echo set_value('decor_size'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('decor_size'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="decor_colour" class="col-lg-offset-1 col-lg-2">Colour:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="decor_colour" id="decor_colour" value="<?php echo set_value('decor_colour'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('decor_colour'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="decor_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="decor_price" id="decor_price" value="<?php echo set_value('decor_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('decor_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="decor_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="decor_description" class="form-control" cols="64" rows="5" id="decor_description"><?php echo set_value('decor_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('decor_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="decor_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="decor_stock" min="0" id="decor_stock" value="<?php echo set_value('decor_stock'); ?>" />
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('decor_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_cd_dvd" method="POST" id="form_cd_dvd" class="form-container form-horizontal" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="7">CD - DVD</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options5 = array();
							foreach($categories7 as $key=>$value) 
							{ 
								$options5[$key] = $value;
							}
						echo form_dropdown('sub_category', $options5, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_name" class="col-lg-offset-1 col-lg-2">CD/DVD Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="cd_dvd_name" id="cd_dvd_name" value="<?php echo set_value('cd_dvd_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('cd_dvd_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_format" class="col-lg-offset-1 col-lg-2">Format:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="cd_dvd_format" id="cd_dvd_format" value="<?php echo set_value('cd_dvd_format'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_format'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_artist" class="col-lg-offset-1 col-lg-2">Artist:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="cd_dvd_artist" id="cd_dvd_artist" value="<?php echo set_value('cd_dvd_artist'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_artist'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_producer" class="col-lg-offset-1 col-lg-2">Producer:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="cd_dvd_producer" id="cd_dvd_producer" value="<?php echo set_value('cd_dvd_producer'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_producer'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_language" class="col-lg-offset-1 col-lg-2">Language</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="cd_dvd_language" id="cd_dvd_language" value="<?php echo set_value('cd_dvd_language'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_language'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="cd_dvd_price" id="cd_dvd_price" value="<?php echo set_value('cd_dvd_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="cd_dvd_stock" min="0" id="cd_dvd_stock" value="<?php echo set_value('cd_dvd_stock'); ?>" />
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="cd_dvd_description" class="col-lg-offset-1 col-lg-2">Contents:</label>
					<div class="col-lg-9">
						<textarea name="cd_dvd_description" class="form-control" cols="64" rows="5" id="cd_dvd_description"><?php echo set_value('cd_dvd_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('cd_dvd_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_date_sweet" method="POST" id="form_dates_sweets" class="form-container form-horizontal" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="8">Dates & Sweets</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options6 = array();
							foreach($categories8 as $key=>$value) 
							{ 
								$options6[$key] = $value;
							}
						echo form_dropdown('sub_category', $options6, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="date_sweet_name" class="col-lg-offset-1 col-lg-2">Date/Sweet Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="date_sweet_name" id="date_sweet_name" value="<?php echo set_value('date_sweet_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('date_sweet_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="date_sweet_brand" class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="date_sweet_brand" id="date_sweet_brand" value="<?php echo set_value('date_sweet_brand'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('date_sweet_brand'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="date_sweet_weight" class="col-lg-offset-1 col-lg-2">Weight:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="date_sweet_weight" id="date_sweet_weight" value="<?php echo set_value('date_sweet_weight'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('date_sweet_weight'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="date_sweet_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="date_sweet_stock" min="0" id="date_sweet_stock" value="<?php echo set_value('date_sweet_stock'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('date_sweet_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="date_sweet_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="date_sweet_price" id="date_sweet_price" value="<?php echo set_value('date_sweet_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('date_sweet_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="date_sweet_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="date_sweet_description" class="form-control" cols="64" rows="5" id="date_sweet_description"><?php echo set_value('date_sweet_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('date_sweet_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_electronics" method="POST" id="form_electronics" class="form-container form-horizontal" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="6">Electronics</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options7 = array();
							foreach($categories6 as $key=>$value) 
							{ 
								$options7[$key] = $value;
							}
						echo form_dropdown('sub_category', $options7, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="electronics_name" class="col-lg-offset-1 col-lg-2">Electronics Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="electronics_name" id="electronics_name" value="<?php echo set_value('electronics_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('electronics_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="electronics_brand" class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="electronics_brand" id="electronics_brand" value="<?php echo set_value('electronics_brand'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('electronics_brand'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="electronics_size" class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="electronics_size" id="electronics_size" value="<?php echo set_value('electronics_size'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('electronics_size'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="electronics_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="electronics_stock" min="0" id="electronics_stock" value="<?php echo set_value('electronics_stock'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('electronics_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="electronics_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="electronics_price" id="electronics_price" value="<?php echo set_value('electronics_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('electronics_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="electronics_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="electronics_description" class="form-control" cols="64" rows="5" id="electronics_description"><?php echo set_value('electronics_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('electronics_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_health_beauty" method="POST" id="form_health" class="form-container form-horizontal" enctype="multipart/form-data">
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="3">Health & Beauty</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options8 = array();
							foreach($categories3 as $key=>$value) 
							{ 
								$options8[$key] = $value;
							}
						echo form_dropdown('sub_category', $options8, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
			
				<div class="form-group">
					<label for="health_beauty_name" class="col-lg-offset-1 col-lg-2">Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="health_name" id="health_beauty_name" value="<?php echo set_value('health_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('health_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="health_brand" class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="health_brand" id="health_brand" value="<?php echo set_value('health_brand'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('health_brand'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="health_size_vol" class="col-lg-offset-1 col-lg-2">Size/Volume:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="health_size_vol" id="health_size_vol" value="<?php echo set_value('health_size_vol'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('health_size_vol'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="health_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="health_stock" min="0" id="health_stock" value="<?php echo set_value('health_stock'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('health_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="health_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="health_price" id="health_price" value="<?php echo set_value('health_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('health_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="health_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="health_description" class="form-control" cols="64" rows="5" id="health_description"><?php echo set_value('health_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('health_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_children" method="POST" id="form_children" class="form-container form-horizontal" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Category:</label>
					<div class="col-lg-9">
						<select name="main_category" class="form-control">
							<option value="10">Children's Corner</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sub Category:</label>
					<div class="col-lg-9">
						<?php 
							$options9 = array();
							foreach($categories10 as $key=>$value) 
							{ 
								$options9[$key] = $value;
							}
						echo form_dropdown('sub_category', $options9, $this->input->post('sub_category'), $css_class);	
						?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="children_name" class="col-lg-offset-1 col-lg-2">Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="children_name" id="children_name" value="<?php echo set_value('children_name'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<span class="help-block is_available"></span>
						<?php echo form_error('children_name'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="children_brand" class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="children_brand" id="children_brand" value="<?php echo set_value('children_brand'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('children_brand'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="children_size" class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-4">
						<input type="text" class="form-control" name="children_size" id="children_size" value="<?php echo set_value('children_size'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('children_size'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="children_stock" class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-3">
						<input type="number" class="form-control" name="children_stock" min="0" id="children_stock" value="<?php echo set_value('children_stock'); ?>"/>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('children_stock'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="children_price" class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-4">
							<div class="input-group">
								<span class="input-group-addon"><strong>&pound;</strong></span>
								<input type="text" class="form-control" name="children_price" id="children_price" value="<?php echo set_value('children_price'); ?>"/>
							</div>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('children_price'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label for="children_description" class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="children_description" class="form-control" cols="64" rows="5" id="children_description"><?php echo set_value('children_description'); ?></textarea>
					</div>
					<div class="col-lg-offset-4">
						<?php echo form_error('children_description'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Upload Image:</label>
					<div class="col-lg-5 col-lg-offset-1 ">
						<input type="file" name="file1" class="file1 form-control" title="First image dimension must be 167 x 180"/>
					</div>
					<div class="col-lg-5 col-lg-offset-1">
						<input type="file" name="file2" class="file2 form-control" title="Second image should be larger image of first"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file3" class="file3 form-control" title="Third image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file4" class="file4 form-control" title="Fourth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file5" class="file5 form-control" title="Fifth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file6" class="file6 form-control" title="Sixth image is any image"/>
					</div>
					<div class="col-lg-5 col-lg-offset-4">
						<input type="file" name="file7" class="file7 form-control" title="Seventh image is any image"/>
					</div>
				</div>
				<br />
				<br />
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_hajjkit" method="POST" id="form_hajjkit" class="form-container" enctype="multipart/form-data">
				
				<label>Category:</label>
				<select name="main_category">
					<option value="11">Hajj Kits</option>
				</select>
				
				<label>Sub Category:</label>
				<?php 
					$options11 = array();
					foreach($categories11 as $key=>$value)
					{ 
						$options11[$key] = $value;
					}
				//used a form dropdown to allow form_validation to correctly prepopulate sub_category field incase of form_validation error
				echo form_dropdown('sub_category', $options11, $this->input->post('sub_category'));	
				?>
				
				<label for="hajjkit_name">Title:</label>
				<input type="text" class="span3" name="hajjkit_name" id="hajjkit_name" value="<?php echo set_value('hajjkit_name'); ?>"/>
				<span class="help-block is_available"></span>
				<?php echo form_error('hajjkit_name'); ?>
				
				<label for="hajjkit_package_description">Full Package Description:</label>
				<textarea class="span5" name="hajjkit_package_description" cols="64" rows="5" id="hajjkit_package_description"><?php echo set_value('hajjkit_package_description'); ?></textarea>
				<?php echo form_error('hajjkit_package_description'); ?>
				
				<label for="hajjkit_ihraam_name">Ihraam Name:</label>
				<input type="text" class="span3" name="hajjkit_ihraam_name" id="hajjkit_ihraam_name" value="<?php echo set_value('hajjkit_ihraam_name'); ?>"/>
				<?php echo form_error('hajjkit_ihraam_name'); ?>
				
				<label for="hajjkit_ihraam_description">Ihraam Description:</label>
				<textarea class="span5" name="hajjkit_ihraam_description" cols="64" rows="5" id="hajjkit_ihraam_description"><?php echo set_value('hajjkit_ihraam_description'); ?></textarea>
				<?php echo form_error('hajjkit_ihraam_description'); ?>
				
				<label for="hajjkit_price">Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="hajjkit_price" id="hajjkit_price" value="<?php echo set_value('hajjkit_price'); ?>"/>
				<?php echo form_error('hajjkit_price'); ?>
				</div>
				
				<label for="hajjkit_stock">Package Quantity in Stock:</label>
				<input type="number" class="span1" name="hajjkit_stock" min="0"  id="hajjkit_stock" value="<?php echo set_value('hajjkit_stock'); ?>"/>
				<?php echo form_error('hajjkit_stock'); ?>
				
				<label for="hajjkit_sleepingbag_name">Sleeping Bag Name:</label>
				<input type="text" class="span3" name="hajjkit_sleepingbag_name"  id="hajjkit_sleepingbag_name" value="<?php echo set_value('hajjkit_sleepingbag_name'); ?>"/>
				<?php echo form_error('hajjkit_sleepingbag_name'); ?>
				
				<label for="hajjkit_sleepingbag_description">Sleeping Bag Description:</label>
				<textarea name="hajjkit_sleepingbag_description" class="span5" cols="64" rows="5" id="hajjkit_sleepingbag_description"><?php echo set_value('hajjkit_sleepingbag_description'); ?></textarea>
				<?php echo form_error('hajjkit_sleepingbag_description'); ?>
				
				<label for="hajjkit_belt_name">Belt Name:</label>
				<input type="text" class="span3" name="hajjkit_belt_name" id="hajjkit_belt_name" value="<?php echo set_value('hajjkit_belt_name'); ?>"/>
				<?php echo form_error('hajjkit_belt_name'); ?>
				
				<label for="hajjkit_belt_description">Belt Description:</label>
				<textarea name="hajjkit_belt_description" class="span5" cols="64" rows="5" id="hajjkit_belt_description"><?php echo set_value('hajjkit_belt_description'); ?></textarea>
				<?php echo form_error('hajjkit_belt_description'); ?>
				
				<label for="hajjkit_waterbottle_name">Water Bottle Name:</label>
				<input type="text" class="span3" name="hajjkit_waterbottle_name" id="hajjkit_waterbottle_name" value="<?php echo set_value('hajjkit_waterbottle_name'); ?>"/>
				<?php echo form_error('hajjkit_waterbottle_name'); ?>
				
				<label for="hajjkit_waterbottle_description">Water Bottle Description:</label>
				<textarea name="hajjkit_waterbottle_description" class="span5" cols="64" rows="5" id="hajjkit_waterbottle_description"><?php echo set_value('hajjkit_waterbottle_description'); ?></textarea>
				<?php echo form_error('hajjkit_waterbottle_description'); ?>
				
				<label for="hajjkit_wudumate_name">Wudu Mate Name:</label>
				<input type="text" class="span3" name="hajjkit_wudumate_name" id="hajjkit_wudumate_name" value="<?php echo set_value('hajjkit_wudumate_name'); ?>"/>
				<?php echo form_error('hajjkit_wudumate_name'); ?>
				
				<label for="hajjkit_wudumate_description">Wudu Mate Description:</label>
				<textarea name="hajjkit_wudumate_description" class="span5" cols="64" rows="5" id="hajjkit_wudumate_description"><?php echo set_value('hajjkit_wudumate_description'); ?></textarea>
				<?php echo form_error('hajjkit_wudumate_description'); ?>
				
				<label for="hajjkit_clock_name">Clock Name:</label>
				<input type="text" class="span3" name="hajjkit_clock_name" id="hajjkit_clock_name" value="<?php echo set_value('hajjkit_clock_name'); ?>"/>
				<?php echo form_error('hajjkit_clock_name'); ?>
				
				<label for="hajjkit_clock_description">Clock Description:</label>
				<textarea name="hajjkit_clock_description" class="span5" cols="64" rows="5" id="hajjkit_clock_description"><?php echo set_value('hajjkit_clock_description'); ?></textarea>
				<?php echo form_error('hajjkit_clock_description'); ?>
				
				<label for="hajjkit_pillow_name">Pillow Name:</label>
				<input type="text" class="span3" name="hajjkit_pillow_name" id="hajjkit_pillow_name" value="<?php echo set_value('hajjkit_pillow_name'); ?>"/>
				<?php echo form_error('hajjkit_pillow_name'); ?>
				
				<label for="hajjkit_pillow_description">Pillow Description:</label>
				<textarea name="hajjkit_pillow_description" class="span5" cols="64" rows="5" id="hajjkit_pillow_description"><?php echo set_value('hajjkit_pillow_description'); ?></textarea>
				<?php echo form_error('hajjkit_pillow_description'); ?>
				
				<label>Upload Image:</label>
				<input type="file" name="file1" class="file1" title="First image dimension must be 167 x 180"/>
				<input type="file" name="file2" class="file2" title="Second image should be larger image of first"/>
				<input type="file" name="file3" class="file3" title="Third image is any image"/>
				<input type="file" name="file4" class="file4" title="Fourth image is any image"/>
				<input type="file" name="file5" class="file5" title="Fifth image is any image"/>
				<input type="file" name="file6" class="file6" title="Sixth image is any image"/>
				<input type="file" name="file7" class="file7" title="Seventh image is any image"/>
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
				
			</form>
			
			<form id="form_accessories" class="form-container" enctype="multipart/form-data">
				Pending...
			</form>
		</div> <!--end form-div-->
    </div> <!-- /container -->

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {

    $('.form-container').hide(); //if taken out, tabs break on refresh.
    $('.btn-group button').click(function(){
		$(this).addClass("active");
        var target = "#" + $(this).data("target");
        $(".form-container").not(target).hide();
		$('.btn-group button').not(this).removeClass("active");
        $(target).show();
    });
	
	var waiting_message = 'Checking...';
	$('#book_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title = $('#book_name').val();
			checkAvailability(title);
	});
	
	$('#clothes_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title2 = $('#clothes_name').val();
			checkAvailability(title2);
	});
	
	$('#perfume_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title3 = $('#perfume_name').val();
			checkAvailability(title3);
	});
	
	$('#decor_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title4 = $('#decor_name').val();
			checkAvailability(title4);
	});
	
	$('#cd_dvd_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title5 = $('#cd_dvd_name').val();
			checkAvailability(title5);
	});
	
	$('#date_sweet_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title6 = $('#date_sweet_name').val();
			checkAvailability(title6);
	});
	
	$('#electronics_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title7 = $('#electronics_name').val();
			checkAvailability(title7);
	});
	
	$('#health_beauty_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title8 = $('#health_beauty_name').val();
			checkAvailability(title8);
	});
	
	$('#children_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title9 = $('#children_name').val();
			checkAvailability(title9);
	});
	
	$('#hajjkit_name').keyup(function(){
			$('.is_available').html(waiting_message);
			var title10 = $('#hajjkit_name').val();
			checkAvailability(title10);
	});
	
	$('.file1').tooltip({'trigger':'hover'});
	$('.file2').tooltip({'trigger':'hover'});
	$('.file3').tooltip({'trigger':'hover'});
	$('.file4').tooltip({'trigger':'hover'});
	$('.file5').tooltip({'trigger':'hover'});
	$('.file6').tooltip({'trigger':'hover'});
	$('.file7').tooltip({'trigger':'hover'});
	
	function checkAvailability(title)
	{	
		$.post("<?php echo base_url();?>admin/checkAvailability", { title: title },
			function(result)
			{
				if(result == 1)
				{
					$('.is_available').removeClass("label label-danger");
					$('.is_available').addClass("label label-success");
					$('.is_available').html('This title is good to go.');
					
				}
				else
				{
					$('.is_available').removeClass("label label-success");
					$('.is_available').addClass("label label-danger");	
					$('.is_available').html('This title is already in the system. Please choose another, more unique title.');
				}
				
			});
			
			if(title == '')
			{
				$('.is_available').hide();
			}
			else
			{
				$('.is_available').show();
			}
	}
	
});
	</script>
  </body>
</html>