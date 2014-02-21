<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Zamzam Islamic Shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.png">
		<link href="<?php echo base_url();?>lightbox/css/screen.css" rel="stylesheet">
		<link href="<?php echo base_url();?>lightbox/css/lightbox.css" rel="stylesheet">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
		
		<link rel="stylesheet" href="<?php echo base_url();?>styles/typeahead_custom.css">
		<link rel="stylesheet" href="<?php echo base_url();?>styles/customer_styles.css">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
		<style>
		
			h6 {
				color: #428bca;
			}
			
			h3, h4 {
				color: #333;
			}
		
		</style>
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
		
		<!--main content-->
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
			
			<!--container-->
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 well">
		
				<form action="<?php echo base_url();?>customer/add_product" method="POST">
					
					<input type="hidden" name="product_id" value="<?php echo $product[0]['product_id'];?>"/>
					
					<h3><center><?php echo $product[0]['title'];?></center></h3>
					<br />
					
					<img class="pull-right" src="<?php echo base_url();?>images/<?php echo $product[0]['product_id'];?>_2.jpg" title="<?php echo $product[0]['title'];?>" alt="<?php echo $product[0]['title'];?>" style="width:295px; height:450px;"/>
					
					<div name="side_info" class="pull-left">
						Price: <span name="price"><strong>&pound;<?php echo $product[0]['price'];?></strong></span> <br />
						Qty in Stock: <span name="quantity"><strong><?php echo $product[0]['stock'];?></strong></span> <br />
						
						<?php if($product[0]['stock'] > 0):?>
						<br /><br /><br /><br /><br />
						
						<!--If the product being viewed is a clothing product, display the sizes dropdown menu-->
						<?php if(isset($product[3]['name']) && $product[3]['name'] == 'size'):?>
						<br />
						<label for="size">Choose your size:</label>
						<select name="size">
							<option value="<?php if(isset($product[3]['name']) && $product[3]['name'] == 'size'){echo $product[3]['value'];}?>"><?php if(isset($product[3]['name']) && $product[3]['name'] == 'size'){echo $product[3]['value'];}?></option>
							<option value="<?php if(isset($product[4]['name']) && $product[4]['name'] == 'size'){echo $product[4]['value'];}?>"><?php if(isset($product[4]['name']) && $product[4]['name'] == 'size'){echo $product[4]['value'];}?></option>
							<option value="<?php if(isset($product[5]['name']) && $product[5]['name'] == 'size'){echo $product[5]['value'];}?>"><?php if(isset($product[5]['name']) && $product[5]['name'] == 'size'){echo $product[5]['value'];}?></option>
							<option value="<?php if(isset($product[6]['name']) && $product[6]['name'] == 'size'){echo $product[6]['value'];}?>"><?php if(isset($product[6]['name']) && $product[6]['name'] == 'size'){echo $product[6]['value'];}?></option>
							<option value="<?php if(isset($product[7]['name']) && $product[7]['name'] == 'size'){echo $product[7]['value'];}?>"><?php if(isset($product[7]['name']) && $product[7]['name'] == 'size'){echo $product[7]['value'];}?></option>
						</select>
						<br /><br />
						<?php endif;?>
						
						<input type="submit" class="btn btn-success btn-large" value="+ Add to Cart"/>
						
						<?php else:?>
						
						<br /><br /><br /><br />
						<img src="<?php echo base_url();?>images/out-of-stock.png"/>
						
						<?php endif;?>
					</div>
					
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
					
					<div class="imageRow span5">
						
						<div class="set">
							
							<div class="single first">
								<a href="<?php echo base_url();?>images/<?php echo $product[0]['product_id'];?>_2.jpg" rel="lightbox[productimage]"><img src="<?php echo base_url();?>images/<?php echo $product[0]['product_id'];?>_1.jpg" style="width:100px; height:100px;"/></a>
							</div>
							
							<?php $path = FCPATH . "images/" . $product[0]['product_id'] . "_";?>
							
							<!--For loop starts at 3 because images 1 and 2 are already used above-->
							<?php for($i=3; $i <= 7; $i++):?>
								<?php $img = $path . $i . ".jpg";?>
								<?php if(file_exists($img)):?>
									<div class="single">
										<a href="<?php echo base_url();?>images/<?php echo $product[0]['product_id'];?>_<?php echo $i; ?>.jpg" rel="lightbox[productimage]">
										  <img src="<?php echo base_url();?>images/<?php echo $product[0]['product_id'];?>_<?php echo $i; ?>.jpg" style="width:100px; height:100px;"/>
										</a>
									</div>
								<?php endif;?>
							<?php endfor;?>
						</div>
					</div>
					
					<table class="table table-bordered">
						<tr>
							<td><strong><?php echo $product[1]['name'];?>:</strong></td>
							<td><?php echo $product[1]['value'];?></td>
						</tr>
						<tr>
							<td><strong><?php echo $product[2]['name'];?>:</strong></td>
							<td><?php echo $product[2]['value'];?></td>
						</tr>
							<!--Indexes 1 and 2 for $product are always set. If indexes 3+ are set and are not clothing sizes, display them in the table-->
							<?php if(isset($product[3]['name']) && $product[3]['name'] != 'size'):?><tr><td><strong><?php echo $product[3]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[3]['value']) && $product[3]['name'] != 'size'):?><td><?php echo $product[3]['value'];?></td></tr><?php endif;?>
						
						
							<?php if(isset($product[4]['name']) && $product[4]['name'] != 'size'):?><tr><td><strong><?php echo $product[4]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[4]['value']) && $product[4]['name'] != 'size'):?><td><?php echo $product[4]['value'];?></td></tr><?php endif;?>
						
						
							<?php if(isset($product[5]['name']) && $product[5]['name'] != 'size'):?><tr><td><strong><?php echo $product[5]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[5]['value']) && $product[5]['name'] != 'size'):?><td><?php echo $product[5]['value'];?></td></tr><?php endif;?>
						
						
							<?php if(isset($product[6]['name']) && $product[6]['name'] != 'size'):?><tr><td><strong><?php echo $product[6]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[6]['value']) && $product[6]['name'] != 'size'):?><td><?php echo $product[6]['value'];?></td></tr><?php endif;?>
						
						
							<?php if(isset($product[7]['name']) && $product[7]['name'] != 'size'):?><tr><td><strong><?php echo $product[7]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[7]['value']) && $product[7]['name'] != 'size'):?><td><?php echo $product[7]['value'];?></td></tr><?php endif;?>
							
							
							<?php if(isset($product[8]['name']) && $product[8]['name'] != 'size'):?><tr><td><strong><?php echo $product[8]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[8]['value']) && $product[8]['name'] != 'size'):?><td><?php echo $product[8]['value'];?></td></tr><?php endif;?>
							
							
							<?php if(isset($product[9]['name']) && $product[9]['name'] != 'size'):?><tr><td><strong><?php echo $product[9]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[9]['value']) && $product[9]['name'] != 'size'):?><td><?php echo $product[9]['value'];?></td></tr><?php endif;?>
							
							
							<?php if(isset($product[10]['name']) && $product[10]['name'] != 'size'):?><tr><td><strong><?php echo $product[10]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[10]['value']) && $product[10]['name'] != 'size'):?><td><?php echo $product[10]['value'];?></td></tr><?php endif;?>
							
							
							<?php if(isset($product[11]['name']) && $product[11]['name'] != 'size'):?><tr><td><strong><?php echo $product[11]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[11]['value']) && $product[11]['name'] != 'size'):?><td><?php echo $product[11]['value'];?></td></tr><?php endif;?>
						
							
							<?php if(isset($product[12]['name']) && $product[12]['name'] != 'size'):?><tr><td><strong><?php echo $product[12]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[12]['value']) && $product[12]['name'] != 'size'):?><td><?php echo $product[12]['value'];?></td></tr><?php endif;?>
							
							
							<?php if(isset($product[13]['name']) && $product[13]['name'] != 'size'):?><tr><td><strong><?php echo $product[13]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[13]['value']) && $product[13]['name'] != 'size'):?><td><?php echo $product[13]['value'];?></td></tr><?php endif;?>
							
							
							<?php if(isset($product[14]['name']) && $product[14]['name'] != 'size'):?><tr><td><strong><?php echo $product[14]['name'];?>:</strong></td><?php endif;?>
							<?php if(isset($product[14]['value']) && $product[14]['name'] != 'size'):?><td><?php echo $product[14]['value'];?></td></tr><?php endif;?>
					</table>
					
					<h4>Description:</h4>
					<p><?php echo $product[0]['description'];?></p>
					
				</form>
				<?php //var_dump($product);?>
			
			</div>
			<!--end container-->
			
			<!--right panel-->
			<div class="col-md-2 col-lg-2">
				<a href="http://www.sisters-magazine.com/Single_Issues/April_2013"><img src="<?php echo base_url();?>images/sisters-mag-banner-april.jpg" class="img-responsive hidden-xs hidden-sm"/></a>
			</div>
			<!--end right panel-->
		
		</div>
		<!--end main content-->
		
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
		
		<script src="<?php echo base_url();?>jquery1.7.2/jquery-1.7.2.min.js"></script>
		<script src="<?php echo base_url();?>lightbox/js/lightbox.js"></script>
		
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
				
			});
		</script>
	</body>
</html>