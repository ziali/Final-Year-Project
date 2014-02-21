<!--Make the low stock indicator yourself in JS, so that you can highlight the entire table row instead of just the stock cell.
	Use addClass()/removeClass() in jQuery with the same if condition as in PHP and add your own styles for warning/danger stock levels.
-->

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
	
	<link href="<?php echo base_url();?>styles/admin_styles.css" rel="stylesheet">
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
		</div>
	
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

		
			<table class="table">
				<thead class="head">
					<th class="text-center"><span class="glyphicon glyphicon-picture"></span></th>
					<th>ID</th>
					<th>Title</th>
					<th>Description</th>
					<th>Price</th>
					<th>Stock</th>
					<th>Category</th>
					<th>SubCategory</th>
					<th>Options</th>
				</thead>
					<?php foreach($search_results as $product):?>
				<tr class="rows">
					<td><img src="<?php echo base_url();?>images/<?php echo $product['product_id'];?>_1.jpg" class="small img-responsive"/></td>
					<td><?php echo $product['product_id'];?></td>
					<td><?php echo $product['title'];?></td>
					<td><?php echo substr($product['description'], 0, 90);?></td>
					<td>&pound;<?php echo $product['price'];?></td>
					<td class="text-center stock"><?php echo $product['stock'];?></td>
					<td><?php echo $product['cat_name'];?></td>
					<td><?php echo $product['subcat_name'];?></td>
					<td id="options"><a href="<?php echo base_url();?>/admin/load_edit_page/<?php echo $product['product_id'];?>" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
						<a data-toggle="modal" href="#modalDelete" class="delete" data-id="<?php echo $product['product_id'];?>" data-name="<?php echo $product['title'];?>"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
					<?php endforeach;?>
			</table>
			<?php //var_dump($search_results); ?>
			<div class="row">
				<div class="col-md-offset-8 col-lg-offset-8 col-md-2 col-lg-2">
					<h4>Color Key:</h4>
				</div>
				<ul id="color-key" class="col-md-2 col-lg-2 list-inline">
					<li id="key-warning" class="well-sm text-center"> Out of stock </li>
					<li id="key-caution" class="well-sm text-center"> Low stock </li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-offset-5 col-lg-offset-5">
					<?php echo $this->pagination->create_links();?>
				</div>
			</div>

	<!-- To add pagination, you will need to use a foreach loop to display each result and make a custom table using CSS instead of generating it with CI.
			Then you can add the pagination class to the search() function in the admin controller. 
			The Table class is just a helper class, it shouldn't be there unless you need it, and in this case its getting in our way.-->

    </div> <!-- /container -->
	
	<!--modalDelete-->
				<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							  <h4 class="modal-title"></h4>
							</div>
							<div class="modal-body">
							  Are you sure you want to delete this product?
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  <a href="<?php echo base_url();?>/admin/delete/<?php echo $product['product_id'];?>" class="btn btn-danger">Delete</a>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /modalDelete -->
    
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.edit').tooltip({'trigger':'hover', 'title':'Edit'});
			$('.delete').tooltip({'trigger':'hover', 'title':'Delete'});
			
			/* add stock control alerts to each table row */
			$('tr.rows').each(function() {
				if( $(this).children('td.stock').text() == 0) {
					$(this).addClass("stock-warning");
				}
				else if( $(this).children('td.stock').text() >= 1 && $(this).children('td.stock').text() <= 9) {
					$(this).addClass("stock-caution");
				}
			});
			
			/*not sure if I need this, but it removes data from previously opened modals.*/
			$('body').on('hidden.bs.modal', function () {
			  $(this).removeData('bs.modal');
			});
			
			$(document).on('click', '.delete', function(e) {
				e.preventDefault();
				var name = $(this).attr('data-name');
				var id = $(this).attr('data-id');
				$('.modal-title').text(name);
				$('.modal-footer a').attr("href", "<?php echo base_url();?>admin/delete/" + id );
			});
			
		});
	</script>
  </body>
</html>