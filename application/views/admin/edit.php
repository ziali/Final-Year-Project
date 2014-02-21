<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Edit Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
		
		<div class="row">
			<h2 class="col-lg-5 col-lg-offset-5">Edit Page</h2>
		</div>
		
		<div class="btn-group">
			
		   <button id="btn-books" data-target="form_books" class="btn btn-primary btn-xs" type="button">Edit Books</button>
		   <button id="btn-clothes" data-target="form_clothes" class="btn btn-primary btn-xs" type="button">Edit Clothing</button>
		   <button id="btn-perfumes" data-target="form_perfumes" class="btn btn-primary btn-xs" type="button">Edit Perfumes</button>
		   <button id="btn-decor" data-target="form_decor" class="btn btn-primary btn-xs" type="button">Edit Decorative Pieces</button>
		   <button id="btn-cd-dvd" data-target="form_cd_dvd" class="btn btn-primary btn-xs" type="button">Edit CDs-DVDs</button>
		   <button id="btn-dates-sweets" data-target="form_dates_sweets" class="btn btn-primary btn-xs" type="button">Edit Dates &amp; Sweets</button>
	       <button id="btn-electronics" data-target="form_electronics" class="btn btn-primary btn-xs" type="button">Edit Electronics</button>
	       <button id="btn-health" data-target="form_health" class="btn btn-primary btn-xs" type="button">Edit Health &amp; Beauty</button>
		   <button id="btn-children" data-target="form_children" class="btn btn-primary btn-xs" type="button">Edit Childrens Products</button>
		   <button id="btn-accessories" data-target="form_accessories" class="btn btn-primary btn-xs" type="button">Edit Accessories</button>
		   <button id="btn-hajjkit" data-target="form_hajjkit" class="btn btn-primary btn-xs" type="button">Hajj Kits</button>
			
		</div>
		<?php //var_dump($product_details);?>
		<!--Display file uploading error, if any-->
		<?php if ($this->session->flashdata('error')):?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('error');?>
				</div>
		<?php endif; ?>
		
		<!--data-target and form id must match and class for all forms must be the same-->
		<div id="form-div" class="col-lg-offset-2 col-md-offset-2 col-lg-8 col-md-8 well">
			
			<form action="<?php echo base_url(); ?>admin/edit_book" method="POST" id="form_books" class="form-container form-horizontal" enctype="multipart/form-data">
				
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Book Title:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Author:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_author" value="<?php if(isset($product_details['Author'])){echo $product_details['Author'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Publisher:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_publisher" value="<?php if(isset($product_details['Publisher'])){echo $product_details['Publisher'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="book_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="book_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description</label>
					<div class="col-lg-9">
						<textarea name="book_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Binding:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_binding" placeholder="Paperback or Hardback" value="<?php if(isset($product_details['Binding'])){echo $product_details['Binding'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_size" placeholder="i.e. A4, A5, A5 Small, etc" value="<?php if(isset($product_details['Size'])){echo $product_details['Size'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Number of Pages:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="book_pages" min="0" value="<?php if(isset($product_details['No. of Pages'])){echo $product_details['No. of Pages'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Language:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="book_language" value="<?php if(isset($product_details['Language'])){echo $product_details['Language'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">ISBN:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="book_isbn" min="0" value="<?php if(isset($product_details['ISBN'])){echo $product_details['ISBN'];} ?>"/>
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
				<input type="hidden" name="book_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_clothes" method="POST" id="form_clothes" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Clothing Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="clothes_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="clothes_brand" value="<?php if(isset($product_details['Brand'])){echo $product_details['Brand'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Colour:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="clothes_colour" value="<?php if(isset($product_details['Colour'])){echo $product_details['Colour'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="clothes_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="clothes_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Sizes:</label>
					<div class="col-lg-9">
						<select name="sizes[]" multiple="multiple" class="form-control">
							<option value="small">Small</option>
							<option value="medium">Medium</option>
							<option value="large">Large</option>
							<option value="xlarge">X-Large</option>
							<option value="xxlarge">XX-Large</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="clothes_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
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
				<input type="hidden" name="clothes_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_perfume" method="POST" id="form_perfumes" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Perfume Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="perfume_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Volume/Size:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="perfume_volume" value="<?php if(isset($product_details['Volume'])){echo $product_details['Volume'];} ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="perfume_brand" value="<?php if(isset($product_details['Brand'])){echo $product_details['Brand'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="perfume_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="perfume_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="perfume_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>" />
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
				<input type="hidden" name="perfume_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_decor" method="POST" id="form_decor" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Decorative Piece Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="decor_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="decor_size" value="<?php if(isset($product_details['Size'])){echo $product_details['Size'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Colour:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="decor_colour" value="<?php if(isset($product_details['Colour'])){echo $product_details['Colour'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="decor_price"  value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="decor_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="decor_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>" />
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
				<input type="hidden" name="decor_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_cd_dvd" method="POST" id="form_cd_dvd" class="form-container form-horizontal" enctype="multipart/form-data">
				
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">CD/DVD Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="cd_dvd_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Format:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="cd_dvd_format" value="<?php if(isset($product_details['Format'])){echo $product_details['Format'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Artist:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="cd_dvd_artist" value="<?php if(isset($product_details['Artist'])){echo $product_details['Artist'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Producer:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="cd_dvd_producer" value="<?php if(isset($product_details['Producer'])){echo $product_details['Producer'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Language</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="cd_dvd_language" value="<?php if(isset($product_details['Language'])){echo $product_details['Language'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="cd_dvd_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="cd_dvd_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Contents:</label>
					<div class="col-lg-9">
						<textarea name="cd_dvd_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
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
				<input type="hidden" name="cd_dvd_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_date_sweet" method="POST" id="form_dates_sweets" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Date/Sweet Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="date_sweet_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="date_sweet_brand" value="<?php if(isset($product_details['Brand'])){echo $product_details['Brand'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Weight:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="date_sweet_weight" value="<?php if(isset($product_details['Weight'])){echo $product_details['Weight'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="date_sweet_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="date_sweet_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="date_sweet_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
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
				<input type="hidden" name="date_sweet_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_electronics" method="POST" id="form_electronics" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Electronics Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="electronics_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="electronics_brand" value="<?php if(isset($product_details['Brand'])){echo $product_details['Brand'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="electronics_size" value="<?php if(isset($product_details['Size'])){echo $product_details['Size'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="electronics_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="electronics_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="electronics_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
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
				<input type="hidden" name="electronics_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_health_beauty" method="POST" id="form_health" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="health_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="health_brand" value="<?php if(isset($product_details['Brand'])){echo $product_details['Brand'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Size/Volume:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="health_size_vol" value="<?php if(isset($product_details['Size/Vol'])){echo $product_details['Size/Vol'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="health_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="health_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="health_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
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
				<input type="hidden" name="health_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_children" method="POST" id="form_children" class="form-container form-horizontal" enctype="multipart/form-data">
			
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
						<select name="sub_category" class="form-control">
							<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
						</select>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Name:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="children_name" value="<?php echo $product_details[0]['title']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Brand:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="children_brand" value="<?php if(isset($product_details['Brand'])){echo $product_details['Brand'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Size:</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="children_size" value="<?php if(isset($product_details['Size'])){echo $product_details['Size'];} ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Quantity in Stock:</label>
					<div class="col-lg-9">
						<input type="number" class="form-control" name="children_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Price:</label>
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-addon"><strong>&pound;</strong></span>
							<input type="text" class="form-control" name="children_price" value="<?php echo $product_details[0]['price']; ?>"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-offset-1 col-lg-2">Description:</label>
					<div class="col-lg-9">
						<textarea name="children_description" class="form-control" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
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
				<input type="hidden" name="children_id" value="<?php echo $product_details[0]['product_id']; ?>">
				<div class="col-lg-7 col-lg-offset-3">
					<input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg"/>
				</div>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/edit_hajjkit" method="POST" id="form_hajjkit" class="form-container" enctype="multipart/form-data">
				
				<label>Category:</label>
				<select name="main_category">
					<option value="11">Hajj Kits</option>
				</select>
				
				<label>Sub Category:</label>
				<select name="sub_category">
				<option value="<?php echo $product_details[0]['subcat_id']; ?>"><?php echo $product_details[0]['subcat_name'];?></option>
				</select>
				
				<label for="hajjkit_name">Title:</label>
				<input type="text" class="span3" name="hajjkit_name" value="<?php echo $product_details[0]['title']; ?>"/>
				<span class="help-block is_available"></span>
				
				
				<label for="hajjkit_package_description">Full Package Description:</label>
				<textarea class="span5" name="hajjkit_package_description" cols="64" rows="5"><?php echo $product_details[0]['description']; ?></textarea>
				
				<label for="hajjkit_ihraam_name">Ihraam Name:</label>
				<input type="text" class="span3" name="hajjkit_ihraam_name" value="<?php if(isset($product_details['Ihraam Name'])){echo $product_details['Ihraam Name'];} ?>"/>
				
				<label for="hajjkit_ihraam_description">Ihraam Description:</label>
				<textarea class="span5" name="hajjkit_ihraam_description" cols="64" rows="5"><?php if(isset($product_details['Ihraam Descr.'])){echo $product_details['Ihraam Descr.'];} ?></textarea>
				
				<label for="hajjkit_price">Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="hajjkit_price" value="<?php echo $product_details[0]['price']; ?>"/>
				</div>
				
				<label for="hajjkit_stock">Package Quantity in Stock:</label>
				<input type="number" class="span1" name="hajjkit_stock" min="0" value="<?php echo $product_details[0]['stock']; ?>"/>
				
				<label for="hajjkit_sleepingbag_name">Sleeping Bag Name:</label>
				<input type="text" class="span3" name="hajjkit_sleepingbag_name" value="<?php if(isset($product_details['Sleeping Bag Name'])){echo $product_details['Sleeping Bag Name'];} ?>"/>
				
				<label for="hajjkit_sleepingbag_description">Sleeping Bag Description:</label>
				<textarea name="hajjkit_sleepingbag_description" class="span5" cols="64" rows="5"><?php if(isset($product_details['Sleeping Bag Descr.'])){echo $product_details['Sleeping Bag Descr.'];} ?></textarea>
				
				<label for="hajjkit_belt_name">Belt Name:</label>
				<input type="text" class="span3" name="hajjkit_belt_name" value="<?php if(isset($product_details['Belt Name'])){echo $product_details['Belt Name'];} ?>"/>
				
				<label for="hajjkit_belt_description">Belt Description:</label>
				<textarea name="hajjkit_belt_description" class="span5" cols="64" rows="5"><?php if(isset($product_details['Belt Descr.'])){echo $product_details['Belt Descr.'];} ?></textarea>
				
				<label for="hajjkit_waterbottle_name">Water Bottle Name:</label>
				<input type="text" class="span3" name="hajjkit_waterbottle_name" value="<?php if(isset($product_details['Water Bottle Name'])){echo $product_details['Water Bottle Name'];} ?>"/>
				
				<label for="hajjkit_waterbottle_description">Water Bottle Description:</label>
				<textarea name="hajjkit_waterbottle_description" class="span5" cols="64" rows="5"><?php if(isset($product_details['Water Bottle Descr.'])){echo $product_details['Water Bottle Descr.'];} ?></textarea>
				
				<label for="hajjkit_wudumate_name">Wudu Mate Name:</label>
				<input type="text" class="span3" name="hajjkit_wudumate_name" value="<?php if(isset($product_details['Wudu Mate'])){echo $product_details['Wudu Mate'];} ?>"/>
				
				<label for="hajjkit_wudumate_description">Wudu Mate Description:</label>
				<textarea name="hajjkit_wudumate_description" class="span5" cols="64" rows="5"><?php if(isset($product_details['Wudu Mate Descr.'])){echo $product_details['Wudu Mate Descr.'];} ?></textarea>
				
				<label for="hajjkit_clock_name">Clock Name:</label>
				<input type="text" class="span3" name="hajjkit_clock_name" value="<?php if(isset($product_details['Clock Name'])){echo $product_details['Clock Name'];} ?>"/>
				
				<label for="hajjkit_clock_description">Clock Description:</label>
				<textarea name="hajjkit_clock_description" class="span5" cols="64" rows="5"><?php if(isset($product_details['Clock Descr.'])){echo $product_details['Clock Descr.'];} ?></textarea>
				
				<label for="hajjkit_pillow_name">Pillow Name:</label>
				<input type="text" class="span3" name="hajjkit_pillow_name" value="<?php if(isset($product_details['Pillow Name'])){echo $product_details['Pillow Name'];} ?>"/>
				
				<label for="hajjkit_pillow_description">Pillow Description:</label>
				<textarea name="hajjkit_pillow_description" class="span5" cols="64" rows="5"><?php if(isset($product_details['Pillow Descr.'])){echo $product_details['Pillow Descr.'];} ?></textarea>
				
				<label>Upload Image:</label>
				<input type="file" name="file1"/>
				<input type="file" name="file2"/>
				<input type="file" name="file3"/>
				<br />
				<input type="hidden" name="hajjkit_id" value="<?php echo $product_details[0]['product_id']; ?>">
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
	});
	</script>
  </body>
</html>