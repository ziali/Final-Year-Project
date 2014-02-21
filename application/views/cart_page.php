<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Zamzam Islamic Shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.png">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" href="<?php echo base_url();?>styles/typeahead_custom.css">
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>styles/customer_styles.css">
	</head>
	
	<body>
	
		<header>
			
			<div class="row">
			
				<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
					<a href="<?php echo base_url();?>customer/index"><img src="<?php echo base_url();?>images/logo copy.png" class="img-responsive"/></a>
				</div>
				
				<form action="<?php echo base_url();?>customer/search" id="search_form" method="POST" class="form-inline col-xs-12 col-sm-6 col-md-7 col-lg-7">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
							<label class="sr-only" for="search_field">Search Field</label>
							<div class="input-group">
								<span class="input-group-addon glyphicon glyphicon-search"></span>
								<input type="search" name="search_field" class="form-control" id="typeahead" autocomplete="off" placeholder="Search products by name">	
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary">Go <span class="glyphicon glyphicon-chevron-right"></span></button>
								</span>
							</div>
						</div>
					</div>
				</form>
			
				<div id="basket_container">
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 text-center">
						<strong>Items:</strong> <?php echo $this->cart->total_items();?> | <strong>Total:</strong> &pound;<?php echo $this->cart->format_number($this->cart->total());?> </br>
						<a href="<?php echo base_url();?>customer/view_cart" id="basket_link" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> View Basket</a>
					</div>
				</div>
				
			</div>
			
			<nav class="navbar navbar-inverse" role="navigation">
				<!--Navigation Header-->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					  <span class="sr-only">Toggle navigation</span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url();?>customer/index" title="Home"><span class="glyphicon glyphicon-home"></span> Home</a>
				</div>
				<!--Navigation Menu Items-->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Books <b class="caret"></b></a>
							<ul class="dropdown-menu">
							
							<?php foreach($subcategory1 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>

							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Clothes <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory2 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Health &amp; Beauty <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory3 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfumes <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory4 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Decorations <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory5 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Electronics <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory6 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">CD-DVD <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory7 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dates &amp; Sweets <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory8 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Accessories <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory9 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Childrens Corner <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php foreach($subcategory10 as $key => $value):?>
							
							<li><a href="<?php echo base_url();?>customer/subcat_products/<?php echo $key;?>"><?php echo $value;?></a></li>
							
							<?php endforeach;?>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		
		<!--container-->
		<div class="row">
		
			<!--left panel-->
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="<?php echo base_url();?>customer/new_arrivals"><h6><center>New Arrivals</center></h6></a>
					</li>
					<li><a href="<?php echo base_url();?>customer/subcat_products/98"><h6><center>Hajj Kits</center></h6></a> <!--Need to find a way to use $subcategory11-->
					</li>
					<li><a href="#c2"><h6><center>Magazines</center></h6></a>
					</li>
				</ul>
			</div>
			<!--end left panel-->
			
			<!--main content-->
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 well">
			<?php if($this->cart->total() != 0):?>
				<?php echo form_open('customer/update_cart'); ?>
				<div class="table-responsive">
					<table class="table">
					<caption><h2>Your Shopping Cart</h2></caption>
					<thead>
						<tr>
						  <th>QTY</th>
						  <th colspan="2">Item Name</th>
						  <th>Size</th>
						  <th>Item Price</th>
						  <th>Sub-Total</th>
						</tr>
					</thead>
					<?php $i = 1; ?>

					<?php foreach ($this->cart->contents() as $items): ?>

						<?php echo form_hidden('rowid[]', $items['rowid']); ?>

						<tr>
						<td><?php echo form_input(array('name' => 'qty[]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '5', 'class' => 'span1')); ?></td>
						<td><img src="<?php echo base_url();?>images/<?php echo $items['id'];?>_1.jpg" style="width:80px; height:80px;" class="img-rounded"/></td>
						<td><?php echo $items['name']; ?></td>
						<td>
								<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

									
										<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

										<?php echo $option_value; ?>

										<?php endforeach; ?>
									

								<?php endif; ?>
						</td>
							<td>&pound;<?php echo $this->cart->format_number($items['price']); ?></td>
							<td>&pound;<?php echo $this->cart->format_number($items['subtotal']); ?></td>
							<td><?php echo anchor('customer/delete/'.$items['rowid'], 'X', array('class' => 'badge'));?></td>
						</tr>

						<?php $i++; ?>

					<?php endforeach; ?>

					<tr>
					  <td colspan="5"></td>
					  <td>
						<strong>Total: </strong>
						<strong>&pound;<?php echo $this->cart->format_number($this->cart->total()); ?></strong>
					  </td>
					</tr>
					
					<tr>
						<td><p><?php echo form_submit(array('class' => 'btn btn-info btn-lg', 'id' => 'update_btn'), 'Update Your Cart'); ?></p></td>
						<?php echo form_close();?>
						<td colspan="4"></td>
						<!--MAKE THIS GO TO A NEW FUNCTION TO PROCEED WITH CHECKOUT-->
						<td><?php echo anchor('/customer/destroy', 'Proceed to Checkout', array('class' => 'btn btn-success btn-lg'));?></td>
					</tr>
					</table>
				</div>
			<?php else:?>
				<h1 class="text-center">Your Shopping Basket is empty! Why?!</h1>
				<p class="text-center">Take a look at our latest products. <?php echo anchor('customer/new_arrivals', 'Click here');?></p>
			<?php endif;?>
			<h1>Make the form action point to a new function in the controller to proceed with checkout, which carries over the posted data. Then make
				the 'update your cart' button an anchor tag which points to a new function called update cart. Remove the destroy cart functionality because
				it's not a good idea to give customers the ability to remove all products in their basket, its enough for them to be able to remove individual items</h1>
			</div>
			<!--end main content-->
			
			<!--right panel-->
			<div class="col-md-2 col-lg-2">
				<a href="http://www.sisters-magazine.com/Single_Issues/April_2013"><img src="<?php echo base_url();?>images/sisters-mag-banner-april.jpg" class="img-responsive hidden-xs hidden-sm"/></a>
			</div>
			<!--end right panel-->
		</div>
		<!--end container-->
		
		<footer class="footer">
			<div class="row">
				<address class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
				  <strong>Zamzam International</strong><br>
				  388 Green Street, Upton Park<br>
				  London, E13 9AP<br>
				  <abbr title="Phone">P:</abbr> (0208) 470-1300
				</address>
				<ul class="list-inline text-center col-xs-8 col-sm-8 col-md-4 col-lg-4">
					<li><a href="#"><img src="<?php echo base_url();?>social_media_icons/74x74/google+.png"/></a></li>
					<li><a href="#"><img src="<?php echo base_url();?>social_media_icons/74x74/twitter.png"/></a></li>
					<li><a href="https://www.facebook.com/zamzamlondon" target="_blank" title="ZamZam Facebook Page"><img src="<?php echo base_url();?>social_media_icons/74x74/facebook.png"/></a></li>
				</ul>
				<ul class="col-xs-1 col-sm-1 col-md-2 col-lg-2 list-unstyled">
					<li><a href=""><span class="glyphicon glyphicon-info-sign"></span> About Us</a></li>
					<li><a href=""><span class="glyphicon glyphicon-globe"></span> Shipping</a></li>
					<li><a href=""><span class="glyphicon glyphicon-exclamation-sign"></span> Terms and Conditions</a></li>
				</ul>
				<ul class="col-xs-1 col-sm-1 col-md-2 col-lg-2 list-unstyled">
					<li><a href=""><span class="glyphicon glyphicon-question-sign"></span> FAQs</a></li>
					<li><a href=""><span class="glyphicon glyphicon-map-marker"></span> How to get here</a></li>
				</ul>
			</div>
		</footer>
		
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<!-- Latest compiled and minified JavaScript Bootstrap-->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>typeahead.js/typeahead.min.js"></script>
		<script>
			$(function() {
			
				$('#typeahead').typeahead({                                
					name: 'search_field',                                                          
					prefetch: '<?php echo base_url(); ?>customer/typeahead_list',                                         
					limit: 10                                                                   
				});
					
				$('#myCarousel').carousel({
						interval: 7000
				});
				
			});
		</script>
	</body>
</html>