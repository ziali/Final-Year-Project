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
			
				<!--Carousel-->
				<div id="myCarousel" class="carousel slide">
					  <ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					  </ol>
					<!-- Carousel items -->
					<div class="carousel-inner">
						<div class="item active">
							<a href="#"><img src="http://placehold.it/1000x450" class="img-rounded" /></a>
							<div class="carousel-caption">
							<h3>Caption 1</h3>
							<p> Text1 </p>
							</div>
						</div>
						<div class="item">
							<a href="#"><img src="http://placehold.it/1000x450" style="width:1000px;" class="img-rounded" /></a>
							<div class="carousel-caption">
							<h3>Caption 2</h3>
							<p> Text2 </p>
							</div>
						</div>
						<!--You can make href point to a function, with an id of an
							item you want to display. i.e. customer/view_product/127-->
						<div class="item">
							<a href="#"><img src="http://placehold.it/1000x450" style="width:1000px;" class="img-rounded" /></a>
							<div class="carousel-caption">
							<h3>Caption 3</h3>
							<p> Text3 </p>
							</div>
						</div>
					</div>
					<!-- Carousel nav -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="icon-next"></span>
					</a>
				</div>
				<!--End Carousel-->
				
				<!--Featured Thumbnails-->
				<h3>Featured Products</h3>	
				<div class="row">
					<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2"> <!--Trailing dots should really be a function to check if the number of characters are < or > 27. Otherwise the dots will appear even if they aren't needed-->
						<div class="thumbnail">
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_1[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_1[0]['product_id'];?>_1.jpg" class="img-responsive" title="<?php echo $featured_1[0]['title'];?>" alt="<?php echo $featured_1[0]['title'];?>" /></a>
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_1[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_1[0]['title'], 0, 27)?>...</h6></a>
							<p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_1[0]['price'];?></strong></span></p>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
						<div class="thumbnail">
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_2[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_2[0]['product_id'];?>_1.jpg" class="img-responsive" title="<?php echo $featured_2[0]['title'];?>" alt="<?php echo $featured_2[0]['title'];?>"></a>
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_2[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_2[0]['title'], 0, 27)?>...</h6></a>
							<p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_2[0]['price'];?></strong></span></p>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
						<div class="thumbnail">
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_3[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_3[0]['product_id'];?>_1.jpg" class="img-responsive"  title="<?php echo $featured_3[0]['title'];?>" alt="<?php echo $featured_3[0]['title'];?>"></a>
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_3[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_3[0]['title'], 0, 27)?>...</h6></a>
							<p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_3[0]['price'];?></strong></span></p>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
						<div class="thumbnail">
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_4[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_4[0]['product_id'];?>_1.jpg" class="img-responsive" title="<?php echo $featured_4[0]['title'];?>" alt="<?php echo $featured_4[0]['title'];?>"></a>
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_4[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_4[0]['title'], 0, 27)?>...</h6></a>
							<p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_4[0]['price'];?></strong></span></p>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
						<div class="thumbnail">
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_5[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_5[0]['product_id'];?>_1.jpg" class="img-responsive" title="<?php echo $featured_5[0]['title'];?>" alt="<?php echo $featured_5[0]['title'];?>"></a>
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_5[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_5[0]['title'], 0, 27)?>...</h6></a>
							<p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_5[0]['price'];?></strong></span></p>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
						<div class="thumbnail">
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_4[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_4[0]['product_id'];?>_1.jpg" class="img-responsive" title="<?php echo $featured_4[0]['title'];?>" alt="<?php echo $featured_4[0]['title'];?>"></a>
							<a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_4[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_4[0]['title'], 0, 27)?>...</h6></a>
							<p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_4[0]['price'];?></strong></span></p>
						</div>
					</div>
				</div>  
				<!--End Featured Thumbnails-->
				
				<!--Best Seller Thumbnails-->
				<h4>Best Sellers</h4>
				<div class="row">
					<div class="col-xs-5 col-sm-4 col-md-2 col-lg-2">
						<div class="thumbnail">
						  <a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_1[0]['product_id'];?>"><img src="<?php echo base_url();?>images/<?php echo $featured_1[0]['product_id'];?>_1.jpg" class="img-responsive" alt="<?php echo $featured_1[0]['title'];?>" /></a>
						  <a href="<?php echo base_url();?>customer/product_main/<?php echo $featured_1[0]['product_id'];?>"><h6 class="text-center"><?php echo substr($featured_1[0]['title'], 0, 27)?>...</h6></a>
						  <p class="text-center"><span class="price"><strong>&pound;<?php echo $featured_1[0]['price'];?></strong></span></p>
						</div>
					</div>
				</div>
				<!--End Best Seller Thumbnails-->
			
			<?php var_dump($featured_1);
			echo $featured_1[0]['title'] . $featured_1[0]['price'] . $featured_1[0]['product_id'];?>
			</div><!--end container-->
			
			<!--right panel-->
			<div class="col-md-2 col-lg-2">
			<a href="http://www.sisters-magazine.com/Single_Issues/April_2013"><img src="<?php echo base_url();?>images/sisters-mag-banner-april.jpg" class="img-responsive hidden-xs hidden-sm"/></a>
			</div>
			<!--end right panel-->
		
		</div>
		
		<footer class="footer">
			<div class="row">
				<address class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
				  <strong>Zamzam International</strong><br>
				  388 Green Street, Upton Park<br>
				  London, E13 9AP<br>
				  <abbr title="Phone">P:</abbr> (0208) 470-1300 <br>
				  Email: <a href="mailto:info@zamzamdirect.com">info@zamzamdirect.com</a>
				</address>
				<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
					<a href="" class="social facebook">&#62220;</a>
					<div class="social twitter">&#62217;</div>
					<div class="social g-plus">&#62223;</div>
				</div>
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