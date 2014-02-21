<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Add Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		}
	  #form-div {
		margin-top: 30px;
		margin-left: 300px;
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
              <li><a href="<?php echo base_url();?>admin">Home</a></li>
              <li class="active"><a href="<?php echo base_url();?>admin/add_products_page">Add Products</a></li>
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
            <input type="text" class="input-large" placeholder="Search products by name">
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
		
		
		<div class="btn-group" data-toggle="buttons-radio">
			
		   <button id="btn-books" data-target="form_books" class="btn btn btn-primary btn-small active" type="button">Add Books</button>
		   <button id="btn-clothes" data-target="form_clothes" class="btn btn btn-primary btn-small" type="button">Add Clothing</button>
		   <button id="btn-perfumes" data-target="form_perfumes" class="btn btn btn-primary btn-small" type="button">Add Perfumes</button>
		   <button id="btn-decor" data-target="form_decor" class="btn btn btn-primary btn-small" type="button">Add Decorative Pieces</button>
		   <button id="btn-cd-dvd" data-target="form_cd_dvd" class="btn btn btn-primary btn-small" type="button">Add CDs-DVDs</button>
		   <button id="btn-dates-sweets" data-target="form_dates_sweets" class="btn btn btn-primary btn-small" type="button">Add Dates &amp; Sweets</button>
	       <button id="btn-electronics" data-target="form_electronics" class="btn btn btn-primary btn-small" type="button">Add Electronics</button>
	       <button id="btn-health" data-target="form_health" class="btn btn btn-primary btn-small" type="button">Add Health &amp; Beauty</button>
		   <button id="btn-children" data-target="form_children" class="btn btn btn-primary btn-small" type="button">Add Childrens Products</button>
		   <button id="btn-accessories" data-target="form_accessories" class="btn btn btn-primary btn-small" type="button">Add Accessories</button>
			
		</div>
		
		<!--Display file uploading error, if any-->
		<?php if ($this->session->flashdata('error')):?>
				<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $this->session->flashdata('error');?>
				</div>
		<?php endif; ?>
		
		<!--data-target and form id must match and class for all forms must be the same-->
		<div id="form-div" class="span5 well">
			
			<form action="<?php echo base_url(); ?>admin/add_book" method="POST" id="form_books" class="form-container" enctype="multipart/form-data">
				
				<label>Category:</label>
				<select name="main_category">
					<option value="1">Books</option>
				</select>
				
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories1 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
				
				<label>Book Title:</label>
				<input type="text" class="span3" name="book_name" value="<?php echo $product_details[0]['title'];?>"/>
				
				<label>Author:</label>
				<input type="text" class="span3" name="book_author" value="<?php echo $product_details[1]['value'];?>"/>
				
				<label>Publisher:</label>
				<input type="text" class="span3" name="book_publisher" value="<?php echo $product_details[2]['value'];?>"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="book_price" value="<?php echo $product_details[0]['price'];?>"/>
				</div>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span1" name="book_stock" min="0" value="<?php echo $product_details[0]['stock'];?>"/>
				
				<label>Description</label>
				<input type="text" name="book_description" class="span5" value="<?php echo $product_details[0]['description'];?>" />
				
				<label>Binding:</label>
				<input type="text" class="span3" name="book_binding" value="<?php echo $product_details[3]['value'];?>"/>
				
				<label>Size:</label>
				<input type="text" class="span3" name="book_size" value="<?php echo $product_details[4]['value'];?>"/>
				
				<label>Number of Pages:</label>
				<input type="number" class="span1" name="book_pages" min="0" value="<?php echo $product_details[5]['value'];?>"/>
				
				<label>Language:</label>
				<input type="text" class="span3" name="book_language" value="<?php if(isset($product_details[6]['value'])){echo $product_details[6]['value'];}?>"/>
				
				<label>ISBN:</label>
				<input type="number" class="span3" name="book_isbn" min="0" value="<?php if(isset($product_details[7]['value'])){echo $product_details[7]['value'];}?>"/>
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_clothes" method="POST" id="form_clothes" class="form-container" enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="2">Clothing</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories2 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
			
				<label>Clothing Name:</label>
				<input type="text" class="span3" name="clothes_name" value="<?php echo $product_details[0]['title'];?>"/>
				
				<label>Brand:</label>
				<input type="text" class="span3" name="clothes_brand" value="<?php echo $product_details[1]['value'];?>"/>
				
				<label>Colour:</label>
				<input type="text" class="span3" name="clothes_colour" value="<?php echo $product_details[2]['value'];?>"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="clothes_price" value="<?php echo $product_details[0]['price'];?>"/>
				</div>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span1" name="clothes_stock" min="0" value="<?php echo $product_details[0]['stock'];?>"/>
				
				<label>Sizes:</label>
				<select name="sizes[]" multiple="multiple">
					<option value="small">Small</option>
					<option value="medium">Medium</option>
					<option value="large">Large</option>
					<option value="xlarge">X-Large</option>
					<option value="xxlarge">XX-Large</option>
				</select>
				
				<label>Description:</label>
				<input type="text" name="clothes_description" class="span5" value="<?php echo $product_details[0]['description'];?>"/>
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_perfume" method="POST" id="form_perfumes" class="form-container" enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="4">Perfumes</option>
				</select>
				
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories4 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
				
				<label>Perfume Name:</label>
				<input type="text" class="span3" name="perfume_name" />
				
				<label>Volume/Size:</label>
				<input type="text" class="span3" name="perfume_volume" />
				
				<label>Brand:</label>
				<input type="text" class="span3" name="perfume_brand" />
				
				<label>Description:</label>
				<textarea name="perfume_description" class="span5" cols="64" rows="5"></textarea>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="perfume_price"/>
				</div>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="perfume_stock" min="0" />
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_decor" method="POST" id="form_decor" class="form-container"  enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="5">Decorations</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories5 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
				
				<label>Decorative Piece Name:</label>
				<input type="text" class="span3" name="decor_name"/>
				
				<label>Size:</label>
				<input type="text" class="span3" name="decor_size"/>
				
				<label>Colour:</label>
				<input type="text" class="span3" name="decor_colour"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="decor_price"/>
				</div>
				
				<label>Description:</label>
				<textarea name="decor_description" class="span5" cols="64" rows="5"></textarea>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="decor_stock" min="0" />
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_cd_dvd" method="POST" id="form_cd_dvd" class="form-container" enctype="multipart/form-data">
				
				<label>Category:</label>
				<select name="main_category">
					<option value="7">CD - DVD</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories7 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
				
				<label>CD/DVD Name:</label>
				<input type="text" class="span3" name="cd_dvd_name"/>
				
				<label>Format:</label>
				<input type="text" class="span3" name="cd_dvd_format"/>
				
				<label>Artist:</label>
				<input type="text" class="span3" name="cd_dvd_artist"/>
				
				<label>Producer:</label>
				<input type="text" class="span3" name="cd_dvd_producer"/>
				
				<label>Language</label>
				<input type="text" class="span3" name="cd_dvd_language"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="cd_dvd_price"/>
				</div>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="cd_dvd_stock" min="0" />
				
				<label>Description/Contents:</label>
				<textarea name="cd_dvd_description" class="span5" cols="64" rows="5"></textarea>
			
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
				
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_date_sweet" method="POST" id="form_dates_sweets" class="form-container" enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="8">Dates & Sweets</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories8 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
				
				<label>Date/Sweet Name:</label>
				<input type="text" class="span3" name="date_sweet_name"/>
				
				<label>Brand:</label>
				<input type="text" class="span3" name="date_sweet_brand"/>
				
				<label>Weight:</label>
				<input type="text" class="span3" name="date_sweet_weight"/>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="date_sweet_stock" min="0"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="date_sweet_price"/>
				</div>
				
				<label>Description:</label>
				<textarea name="date_sweet_description" class="span5" cols="64" rows="5"></textarea>
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_electronics" method="POST" id="form_electronics" class="form-container" enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="6">Electronics</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories6 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
			
				<label>Electronics Name:</label>
				<input type="text" class="span3" name="electronics_name"/>
				
				<label>Brand:</label>
				<input type="text" class="span3" name="electronics_brand"/>
				
				<label>Size:</label>
				<input type="text" class="span3" name="electronics_size"/>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="electronics_stock" min="0"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="electronics_price"/>
				</div>
				
				<label>Description:</label>
				<textarea name="electronics_description" class="span5" cols="64" rows="5"></textarea>
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_health_beauty" method="POST" id="form_health" class="form-container" enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="3">Health & Beauty</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories3 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
			
				<label>Name:</label>
				<input type="text" class="span3" name="health_name"/>
				
				<label>Brand:</label>
				<input type="text" class="span3" name="health_brand"/>
				
				<label>Size/Volume:</label>
				<input type="text" class="span3" name="health_size_vol"/>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="health_stock" min="0"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="health_price"/>
				</div>
				
				<label>Description:</label>
				<textarea name="health_description" class="span5" cols="64" rows="5"></textarea>
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
				<br />
				<br />
				<input type="submit" value="Submit" class="btn btn-primary"/>
			
			</form>
			
			<form action="<?php echo base_url(); ?>admin/add_children" method="POST" id="form_children" class="form-container" enctype="multipart/form-data">
			
				<label>Category:</label>
				<select name="main_category">
					<option value="10">Children's Corner</option>
				</select>
				<label>Sub Category:</label>
				<select name="sub_category">
				<?php foreach($categories10 as $key=>$value) { ?>
				<option value="<?php echo $key; ?>"><?php echo $value;?></option>
				<?php } ?>
				</select>
			
				<label>Name:</label>
				<input type="text" class="span3" name="children_name"/>
				
				<label>Brand:</label>
				<input type="text" class="span3" name="children_brand"/>
				
				<label>Size:</label>
				<input type="text" class="span3" name="children_size"/>
				
				<label>Quantity in Stock:</label>
				<input type="number" class="span2" name="children_stock" min="0"/>
				
				<label>Price:</label>
				<div class="input-prepend">
				<span class="add-on"><strong>&pound;</strong></span>
				<input type="text" class="span2" name="children_price"/>
				</div>
				
				<label>Description:</label>
				<textarea name="children_description" class="span5" cols="64" rows="5"></textarea>
				
				<label>Upload Image:</label>
				<input type="file" name="userfile" />
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
	<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {

    $('.form-container').hide(); //if taken out, tabs break on refresh.
    $('.btn-group button').click(function(){
        var target = "#" + $(this).data("target");
        $(".form-container").not(target).hide();
        $(target).show();
    });

});
	</script>
  </body>
</html>