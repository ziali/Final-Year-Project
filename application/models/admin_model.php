<?php

class Admin_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
		$this->load->helper('date');
    }

	function validate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$salt = substr($username, 0, 2);
		
		$crypted_password = crypt($password, $salt);
		
		$this->db->where('username', $username);
		$this->db->where('password', $crypted_password);
		$res = $this->db->get('users');
		
		/*$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', sha1($this->input->post('password')));
		$res = $this->db->get('users');*/
		
		if($res->num_rows == 1)
		{
			return TRUE;
		}
	}
	
	function create_account()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$human_name = $this->input->post('fullname');
		
		$salt = substr($username, 0, 2);
		
		$crypted_password = crypt($password, $salt);
		
		$data = array(
			'username' => $username,
			'password' => $crypted_password,
			'name' => $human_name
		);
		
		$this->db->insert('users', $data);
		
		if($this->db->affected_rows() != 1)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function getCategories()
	{
		$this->db->select('cat_id, cat_name');
		$res = $this->db->get('categories');
		
		$categories = array();
		
		foreach($res->result() as $row)
		{
			$categories[$row->cat_id] = $row->cat_name;
		}
		
		return $categories;
	}
	
	function getSubcategories($id)
	{
		$this->db->select('*');
		$this->db->where('subcategories.cat_id', $id);
		$res = $this->db->get('subcategories');
		
		$subcategories = array();
		
		foreach($res->result() as $row)
		{
			$subcategories[$row->subcat_id] = $row->subcat_name;
		}
		
		return $subcategories;
	}
	
	function createSubcategory($cat_id, $subcat_name)
	{
		$data = array(
			'subcat_name' => $subcat_name,
			'cat_id' => $cat_id
			);
		$this->db->insert('subcategories', $data);
		
		if($this->db->affected_rows() == 1)
		{
			return true;
		}
	}
	
	function checkTitleAvailability($title)
	{
		$this->db->select('title');
		$this->db->from('products');
		$this->db->where('title', $title);
		$result = $this->db->get();
		
		$count = $result->num_rows();
		if($count > 0)
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
	function search($val, $limit, $offset)
	{
		$this->db->select('products.product_id,
						   products.title,
						   products.description,
						   products.price,
						   products.stock,
						   categories.cat_name,
						   subcategories.subcat_name');
		$this->db->from('products');
		$this->db->like('products.title', $val);
		$this->db->or_like('products.product_id', $val);
		$this->db->join('categories', 'categories.cat_id = products.cat_id', 'inner');
		$this->db->join('subcategories', 'subcategories.subcat_id = products.subcat_id', 'inner');
		$this->db->limit($limit, $offset);
		$res = $this->db->get();
		
		return $res->result_array();
	}
	
	function search_total_rows($val)
	{
		$this->db->select('title');
		$this->db->from('products');
		$this->db->like('title', $val);
		$res = $this->db->get();
		return $res->num_rows();
	}
	
	function getProduct($id)
	{
		//return $this->db->get_where('products', array('product_id'=> $id));
		/*$this->db->select('products.title,
						   products.description,
						   products.price,
						   products.stock,
						   product_attributes.name,
						   product_attributes.value');
		$this->db->from('products');
		$this->db->where('products.product_id', $id);
		$this->db->join('product_attributes', 'product_attributes.product_id = products.product_id', 'inner');
		//$this->db->limit(1);
		$result = $this->db->get();
		
		return $result->result_array();*/
		
		$this->db->select('products.product_id,
						   products.title,
						   products.description,
						   products.price,
						   products.stock,
						   subcategories.subcat_name,
						   subcategories.subcat_id');
		$this->db->from('products');
		$this->db->where('product_id', $id);
		$this->db->join('subcategories', 'subcategories.subcat_id = products.subcat_id', 'inner');
		$result = $this->db->get();
		$array1 = $result->result_array();
		
		$this->db->select('name, value');
		$this->db->from('product_attributes');
		$this->db->where('product_id', $id);
		$result2 = $this->db->get();
		$array2 = $result2->result_array();
		
		foreach($array2 as $attribute)
		{
			$array1[$attribute['name']] = $attribute['value'];
		}
		
		return $array1;
		//$data = array_merge($array1,$array2);
		//return $data;
	}
	
	function add_book()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('book_name');
		$author = $this->input->post('book_author');
		$publisher = $this->input->post('book_publisher');
		$price = $this->input->post('book_price');
		$stock = $this->input->post('book_stock');
		$description = $this->input->post('book_description');
		$binding = $this->input->post('book_binding');
		$size = $this->input->post('book_size');
		$num_pages = $this->input->post('book_pages');
		$language = $this->input->post('book_language');
		$isbn = $this->input->post('book_isbn');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Author', 'value' => $author, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Publisher', 'value' => $publisher, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Binding', 'value' => $binding, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Size', 'value' => $size, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'No. of Pages', 'value' => $num_pages, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Language', 'value' => $language, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'ISBN', 'value' => $isbn, 'product_id' => $id));
		
		
		return $id;
		
	}
	
	function add_clothes()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('clothes_name');
		$brand = $this->input->post('clothes_brand');
		$colour = $this->input->post('clothes_colour');
		$price = $this->input->post('clothes_price');
		$stock = $this->input->post('clothes_stock');
		$description = $this->input->post('clothes_description');
		$sizes = $this->input->post('sizes');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Brand', 'value' => $brand, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Colour', 'value' => $colour, 'product_id' => $id));
		foreach($sizes as $size)
		{
			$data[] = array(
				'name' => 'size',
				'value' => $size,
				'product_id' => $id
				);
		}
		$this->db->insert_batch('product_attributes', $data);
		
		return $id;
	}
	
	function add_perfume()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('perfume_name');
		$brand = $this->input->post('perfume_brand');
		$volume = $this->input->post('perfume_volume');
		$price = $this->input->post('perfume_price');
		$stock = $this->input->post('perfume_stock');
		$description = $this->input->post('perfume_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Brand', 'value' => $brand, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Volume', 'value' => $volume, 'product_id' => $id));
		
		return $id;
	}
	
	function add_decor()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('decor_name');
		$size = $this->input->post('decor_size');
		$colour = $this->input->post('decor_colour');
		$price = $this->input->post('decor_price');
		$stock = $this->input->post('decor_stock');
		$description = $this->input->post('decor_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Size', 'value' => $size, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Colour', 'value' => $colour, 'product_id' => $id));
		
		return $id;
	}
	
	function add_cd_dvd()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('cd_dvd_name');
		$artist = $this->input->post('cd_dvd_artist');
		$producer = $this->input->post('cd_dvd_producer');
		$lang = $this->input->post('cd_dvd_language');
		$format = $this->input->post('cd_dvd_format');
		$price = $this->input->post('cd_dvd_price');
		$stock = $this->input->post('cd_dvd_stock');
		$description = $this->input->post('cd_dvd_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Artist', 'value' => $artist, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Producer', 'value' => $producer, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Language', 'value' => $lang, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Format', 'value' => $format, 'product_id' => $id));
		
		return $id;
	}
	
	function add_date_sweet()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('date_sweet_name');
		$brand = $this->input->post('date_sweet_brand');
		$weight = $this->input->post('date_sweet_weight');
		$price = $this->input->post('date_sweet_price');
		$stock = $this->input->post('date_sweet_stock');
		$description = $this->input->post('date_sweet_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Brand', 'value' => $brand, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Weight', 'value' => $weight, 'product_id' => $id));
		
		return $id;
	}
	
	function add_electronics()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('electronics_name');
		$brand = $this->input->post('electronics_brand');
		$size = $this->input->post('electronics_size');
		$price = $this->input->post('electronics_price');
		$stock = $this->input->post('electronics_stock');
		$description = $this->input->post('electronics_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Brand', 'value' => $brand, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Size', 'value' => $size, 'product_id' => $id));
		
		return $id;
	}
	
	function add_health_beauty()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('health_name');
		$brand = $this->input->post('health_brand');
		$size = $this->input->post('health_size_vol');
		$price = $this->input->post('health_price');
		$stock = $this->input->post('health_stock');
		$description = $this->input->post('health_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Brand', 'value' => $brand, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Size/Vol', 'value' => $size, 'product_id' => $id));
		
		return $id;
	}
	
	function add_children()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('children_name');
		$brand = $this->input->post('children_brand');
		$size = $this->input->post('children_size');
		$price = $this->input->post('children_price');
		$stock = $this->input->post('children_stock');
		$description = $this->input->post('children_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Brand', 'value' => $brand, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Size', 'value' => $size, 'product_id' => $id));
		
		return $id;
	}
	
	function add_hajjkit()
	{
		$maincat = $this->input->post('main_category');
		$subcat = $this->input->post('sub_category');
		$name = $this->input->post('hajjkit_name');
		$ihraam_name = $this->input->post('hajjkit_ihraam_name');
		$ihraam_description = $this->input->post('hajjkit_ihraam_description');
		$sleepingbag_name = $this->input->post('hajjkit_sleepingbag_name');
		$sleepingbag_description = $this->input->post('hajjkit_sleepingbag_description');
		$belt_name = $this->input->post('hajjkit_belt_name');
		$belt_description = $this->input->post('hajjkit_belt_description');
		$waterbottle_name = $this->input->post('hajjkit_waterbottle_name');
		$waterbottle_description = $this->input->post('hajjkit_waterbottle_description');
		$wudumate_name = $this->input->post('hajjkit_wudumate_name');
		$wudumate_description = $this->input->post('hajjkit_wudumate_description');
		$clock_name = $this->input->post('hajjkit_clock_name');
		$clock_description = $this->input->post('hajjkit_clock_description');
		$pillow_name = $this->input->post('hajjkit_pillow_name');
		$pillow_description = $this->input->post('hajjkit_pillow_description');
		$size = $this->input->post('children_size');
		$price = $this->input->post('hajjkit_price');
		$stock = $this->input->post('hajjkit_stock');
		$description = $this->input->post('hajjkit_package_description');
		
		$into_products = array(
				'date_added' => date('Y-m-d H:i:s', NOW()),
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'cat_id' => $maincat,
				'subcat_id' => $subcat
				);
				
		$this->db->insert('products', $into_products);
		
		$id = $this->db->insert_id();
		
		$this->db->insert('product_attributes', array('name' => 'Ihraam Name', 'value' => $ihraam_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Ihraam Descr.', 'value' => $ihraam_description, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Sleeping Bag Name', 'value' => $sleepingbag_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Sleeping Bag Descr.', 'value' => $sleepingbag_description, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Belt Name', 'value' => $belt_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Belt Descr.', 'value' => $belt_description, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Water Bottle Name', 'value' => $waterbottle_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Water Bottle Descr.', 'value' => $waterbottle_description, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Wudu Mate', 'value' => $wudumate_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Wudu Mate Descr.', 'value' => $wudumate_description, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Clock Name', 'value' => $clock_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Clock Descr.', 'value' => $clock_description, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Pillow Name', 'value' => $pillow_name, 'product_id' => $id));
		$this->db->insert('product_attributes', array('name' => 'Pillow Descr.', 'value' => $pillow_description, 'product_id' => $id));
		
		return $id;
	}
	
	function edit_book()
	{
		//uri segment(3) didn't work for some reason, mention that in report
		$id = $this->input->post('book_id');
		$name = $this->input->post('book_name');
		$author = $this->input->post('book_author');
		$publisher = $this->input->post('book_publisher');
		$price = $this->input->post('book_price');
		$stock = $this->input->post('book_stock');
		$description = $this->input->post('book_description');
		$binding = $this->input->post('book_binding');
		$size = $this->input->post('book_size');
		$num_pages = $this->input->post('book_pages');
		$language = $this->input->post('book_language');
		$isbn = $this->input->post('book_isbn');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_author = array(
				'name' => 'Author',
				'value' => $author
				);
		$this->db->where('name', 'Author');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_author);
		
		$this->db->flush_cache();
		
		$update_publisher = array(
				'name' => 'Publisher',
				'value' => $publisher
				);
		$this->db->where('name', 'Publisher');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_publisher);
		
		$this->db->flush_cache();
		
		$update_binding = array(
				'name' => 'Binding',
				'value' => $binding
				);
		$this->db->where('name', 'Binding');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_binding);
		
		$this->db->flush_cache();
		
		$update_size = array(
				'name' => 'Size',
				'value' => $size
				);
		$this->db->where('name', 'Size');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_size);
		
		$this->db->flush_cache();
		
		$update_num_pages = array(
				'name' => 'No. of Pages',
				'value' => $num_pages
				);
		$this->db->where('name', 'No. of Pages');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_num_pages);
		
		$this->db->flush_cache();
		
		$update_lang = array(
				'name' => 'Language',
				'value' => $language
				);
		$this->db->where('name', 'Language');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_lang);
		
		$this->db->flush_cache();
		
		$update_isbn = array(
				'name' => 'ISBN',
				'value' => $isbn
				);
		$this->db->where('name', 'ISBN');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_isbn);
		
		return $id;
	}
	
	function edit_clothes()
	{
		$id = $this->input->post('clothes_id');
		$name = $this->input->post('clothes_name');
		$brand = $this->input->post('clothes_brand');
		$colour = $this->input->post('clothes_colour');
		$price = $this->input->post('clothes_price');
		$stock = $this->input->post('clothes_stock');
		$description = $this->input->post('clothes_description');
		/*need to find a way to get the number of sizes already in the database and display them,
		and then update them in the database with the new sizes available.
		$size = $this->input->post('book_size');*/
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_brand = array(
				'name' => 'Brand',
				'value' => $brand
				);
		$this->db->where('name', 'Brand');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_brand);
		
		$this->db->flush_cache();
		
		$update_colour = array(
				'name' => 'Colour',
				'value' => $colour
				);
		$this->db->where('name', 'Colour');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_colour);
		
		return $id;
	}
	
	function edit_perfume()
	{
		$id = $this->input->post('perfume_id');
		$name = $this->input->post('perfume_name');
		$brand = $this->input->post('perfume_brand');
		$volume = $this->input->post('perfume_volume');
		$price = $this->input->post('perfume_price');
		$stock = $this->input->post('perfume_stock');
		$description = $this->input->post('perfume_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_brand = array(
				'name' => 'Brand',
				'value' => $brand
				);
		$this->db->where('name', 'Brand');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_brand);
		
		$this->db->flush_cache();
		
		$update_volume = array(
				'name' => 'Volume',
				'value' => $volume
				);
		$this->db->where('name', 'Volume');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_volume);
		
		return $id;
	}
	
	function edit_decor()
	{
		$id = $this->input->post('decor_id');
		$name = $this->input->post('decor_name');
		$size = $this->input->post('decor_size');
		$colour = $this->input->post('decor_colour');
		$price = $this->input->post('decor_price');
		$stock = $this->input->post('decor_stock');
		$description = $this->input->post('decor_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_size = array(
				'name' => 'Size',
				'value' => $size
				);
		$this->db->where('name', 'Size');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_size);
		
		$this->db->flush_cache();
		
		$update_colour = array(
				'name' => 'Colour',
				'value' => $colour
				);
		$this->db->where('name', 'Size');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_colour);
		
		return $id;
	}
	
	function edit_cd_dvd()
	{
		$id = $this->input->post('cd_dvd_id');
		$name = $this->input->post('cd_dvd_name');
		$artist = $this->input->post('cd_dvd_artist');
		$producer = $this->input->post('cd_dvd_producer');
		$lang = $this->input->post('cd_dvd_language');
		$format = $this->input->post('cd_dvd_format');
		$price = $this->input->post('cd_dvd_price');
		$stock = $this->input->post('cd_dvd_stock');
		$description = $this->input->post('cd_dvd_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_artist = array(
				'name' => 'Artist',
				'value' => $artist
				);
		$this->db->where('name', 'Artist');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_artist);
		
		$this->db->flush_cache();
		
		$update_producer = array(
				'name' => 'Producer',
				'value' => $producer
				);
		$this->db->where('name', 'Producer');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_producer);
		
		$this->db->flush_cache();
		
		$update_format = array(
				'name' => 'Format',
				'value' => $format
				);
		$this->db->where('name', 'Format');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_format);
		
		$this->db->flush_cache();
		
		$update_lang = array(
				'name' => 'Language',
				'value' => $lang
				);
		$this->db->where('name', 'Language');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_lang);
		
		return $id;
	}
	
	function edit_date_sweet()
	{
		$id = $this->input->post('date_sweet_id');
		$name = $this->input->post('date_sweet_name');
		$brand = $this->input->post('date_sweet_brand');
		$weight = $this->input->post('date_sweet_weight');
		$price = $this->input->post('date_sweet_price');
		$stock = $this->input->post('date_sweet_stock');
		$description = $this->input->post('date_sweet_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_brand = array(
				'name' => 'Brand',
				'value' => $brand
				);
		$this->db->where('name', 'Brand');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_brand);
		
		$this->db->flush_cache();
		
		$update_weight = array(
				'name' => 'Weight',
				'value' => $weight
				);
		$this->db->where('name', 'Weight');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_weight);
		
		return $id;
	}
	
	function edit_electronics()
	{
		$id = $this->input->post('electronics_id');
		$name = $this->input->post('electronics_name');
		$brand = $this->input->post('electronics_brand');
		$size = $this->input->post('electronics_size');
		$price = $this->input->post('electronics_price');
		$stock = $this->input->post('electronics_stock');
		$description = $this->input->post('electronics_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_brand = array(
				'name' => 'Brand',
				'value' => $brand
				);
		$this->db->where('name', 'Brand');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_brand);
		
		$this->db->flush_cache();
		
		$update_size = array(
				'name' => 'Size',
				'value' => $size
				);
		$this->db->where('name', 'Size');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_size);
		
		return $id;
	}
	
	function edit_health_beauty()
	{
		$id = $this->input->post('health_id');
		$name = $this->input->post('health_name');
		$brand = $this->input->post('health_brand');
		$size = $this->input->post('health_size_vol');
		$price = $this->input->post('health_price');
		$stock = $this->input->post('health_stock');
		$description = $this->input->post('health_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_brand = array(
				'name' => 'Brand',
				'value' => $brand
				);
		$this->db->where('name', 'Brand');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_brand);
		
		$this->db->flush_cache();
		
		$update_size = array(
				'name' => 'Size/Vol',
				'value' => $size
				);
		$this->db->where('name', 'Size/Vol');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_size);
		
		return $id;
	}
	
	function edit_children()
	{
		$id = $this->input->post('children_id');
		$name = $this->input->post('children_name');
		$brand = $this->input->post('children_brand');
		$size = $this->input->post('children_size');
		$price = $this->input->post('children_price');
		$stock = $this->input->post('children_stock');
		$description = $this->input->post('children_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_brand = array(
				'name' => 'Brand',
				'value' => $brand
				);
		$this->db->where('name', 'Brand');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_brand);
		
		$this->db->flush_cache();
		
		$update_size = array(
				'name' => 'Size',
				'value' => $size
				);
		$this->db->where('name', 'Size');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_size);
		
		return $id;
	}
	
	function edit_hajjkit()
	{
		$id = $this->input->post('hajjkit_id');
		$name = $this->input->post('hajjkit_name');
		$ihraam_name = $this->input->post('hajjkit_ihraam_name');
		$ihraam_description = $this->input->post('hajjkit_ihraam_description');
		$sleepingbag_name = $this->input->post('hajjkit_sleepingbag_name');
		$sleepingbag_description = $this->input->post('hajjkit_sleepingbag_description');
		$belt_name = $this->input->post('hajjkit_belt_name');
		$belt_description = $this->input->post('hajjkit_belt_description');
		$waterbottle_name = $this->input->post('hajjkit_waterbottle_name');
		$waterbottle_description = $this->input->post('hajjkit_waterbottle_description');
		$wudumate_name = $this->input->post('hajjkit_wudumate_name');
		$wudumate_description = $this->input->post('hajjkit_wudumate_description');
		$clock_name = $this->input->post('hajjkit_clock_name');
		$clock_description = $this->input->post('hajjkit_clock_description');
		$pillow_name = $this->input->post('hajjkit_pillow_name');
		$pillow_description = $this->input->post('hajjkit_pillow_description');
		$size = $this->input->post('children_size');
		$price = $this->input->post('hajjkit_price');
		$stock = $this->input->post('hajjkit_stock');
		$description = $this->input->post('hajjkit_package_description');
		
		$for_products = array(
				'title' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock
				);
		
		$this->db->where('product_id', $id);
		$this->db->update('products', $for_products);
		
		//I'm flushing after each update to avoid collision
		$this->db->flush_cache();
		
		$update_ihraam_name = array(
				'name' => 'Ihraam Name',
				'value' => $ihraam_name
				);
		$this->db->where('name', 'Ihraam Name');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_ihraam_name);
		
		$this->db->flush_cache();
		
		$update_ihraam_descr = array(
				'name' => 'Ihraam Descr.',
				'value' => $ihraam_description
				);
		$this->db->where('name', 'Ihraam Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_ihraam_descr);
		
		$this->db->flush_cache();
		
		$update_sleepingbag_name = array(
				'name' => 'Sleeping Bag Name',
				'value' => $ihraam_description
				);
		$this->db->where('name', 'Sleeping Bag Name');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_sleepingbag_name);
		
		$this->db->flush_cache();
		
		$update_sleepingbag_descr = array(
				'name' => 'Sleeping Bag Descr.',
				'value' => $sleepingbag_description
				);
		$this->db->where('name', 'Sleeping Bag Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_sleepingbag_descr);
		
		$this->db->flush_cache();
		
		$update_belt_name = array(
				'name' => 'Belt Name',
				'value' => $belt_name
				);
		$this->db->where('name', 'Belt Name');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_belt_name);
		
		$this->db->flush_cache();
		
		$update_belt_descr = array(
				'name' => 'Belt Descr.',
				'value' => $belt_name
				);
		$this->db->where('name', 'Belt Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_belt_descr);
		
		$this->db->flush_cache();
		
		$update_waterbottle_name = array(
				'name' => 'Water Bottle Name#',
				'value' => $waterbottle_name
				);
		$this->db->where('name', 'Water Bottle Name');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_waterbottle_name);
		
		$this->db->flush_cache();
		
		$update_waterbottle_descr = array(
				'name' => 'Water Bottle Descr.',
				'value' => $waterbottle_description
				);
		$this->db->where('name', 'Water Bottle Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_waterbottle_descr);
		
		$this->db->flush_cache();
		
		$update_wudumate_name = array(
				'name' => 'Wudu Mate',
				'value' => $wudumate_name
				);
		$this->db->where('name', 'Wudu Mate');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_wudumate_name);
		
		$this->db->flush_cache();
		
		$update_wudumate_descr = array(
				'name' => 'Wudu Mate Descr.',
				'value' => $wudumate_description
				);
		$this->db->where('name', 'Wudu Mate Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_wudumate_descr);
		
		$this->db->flush_cache();
		
		$update_clock_name = array(
				'name' => 'Clock Name',
				'value' => $clock_name
				);
		$this->db->where('name', 'Clock Name');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_clock_name);
		
		$this->db->flush_cache();
		
		$update_clock_descr = array(
				'name' => 'Clock Descr.',
				'value' => $clock_description
				);
		$this->db->where('name', 'Clock Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_clock_descr);
		
		$this->db->flush_cache();
		
		$update_pillow_name = array(
				'name' => 'Pillow Name',
				'value' => $pillow_name
				);
		$this->db->where('name', 'Pillow Name');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_pillow_name);
		
		$this->db->flush_cache();
		
		$update_pillow_descr = array(
				'name' => 'Pillow Descr.',
				'value' => $pillow_description
				);
		$this->db->where('name', 'Pillow Descr.');
		$this->db->where('product_id', $id);
		$this->db->update('product_attributes', $update_pillow_descr);
		
		return $id;
	}
	
	function delete_product($id)
	{
		$upload_image = array("1", "2", "3", "4", "5", "6", "7");
		
		$tables = array('products', 'product_attributes');
		$this->db->trans_start();
		$this->db->where('product_id', $id);
		$this->db->delete($tables);
		$this->db->trans_complete();
		
		if ($this->db->trans_status() === FALSE)
		{
			//if the transaction fails it will return false and not commit
			return FALSE;
		}
		else
		{
			//product was deleted
			for($i = 1; $i <= 7; $i++)
			{
				$img = FCPATH . "images/" . $id . "_" . $i . ".jpg";
				
				if(file_exists($img))
				{
					unlink(FCPATH . "images/" . $id . "_" . $i . ".jpg");
				}
			}
			return TRUE;
		}
		
	}
}